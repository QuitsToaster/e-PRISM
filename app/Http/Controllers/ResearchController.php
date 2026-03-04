<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Proponent;
use App\Models\Attachment;
use App\Models\ResearchChapter;
use App\Models\ResearchChapterTable;
use App\Models\ResearchChapterTableRow;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\PhpWord;

class ResearchController extends Controller
{
    public function create() {
        return view('submit_paper');
    }
public function store(Request $request)
{
    DB::transaction(function () use ($request) {

        /* =========================================
           CREATE RESEARCH
        ==========================================*/
        $research = Research::create([
            'user_id'        => auth()->id(),
            'classification' => $request->classification,
            'research_type'  => $request->research_type,
            'school'         => $request->school,
            'school_id'      => $request->school_id,
            'title'          => $request->title,
            'status'         => $request->action
        ]);


        /* =========================================
           SAVE PROPONENTS
        ==========================================*/
        if (!empty($request->proponents) && is_array($request->proponents)) {

            foreach ($request->proponents as $proponent) {

                if (empty($proponent['name']) || empty($proponent['position'])) {
                    continue;
                }

                $photoPath = null;

                if (isset($proponent['photo']) && $proponent['photo'] instanceof \Illuminate\Http\UploadedFile) {
                    $photoPath = $proponent['photo']->store('proponents', 'public');
                }

                Proponent::create([
                    'research_id' => $research->id,
                    'name'        => $proponent['name'],
                    'position'    => $proponent['position'],
                    'photo'       => $photoPath
                ]);
            }
        }


        /* =========================================
           SAVE CHAPTERS
        ==========================================*/
        if (!empty($request->chapters) && is_array($request->chapters)) {

            foreach ($request->chapters as $index => $chapter) {

                $chapterTitle = $chapter['title'] ?? 'Chapter ' . ($index + 1);
                $chapterContent = $chapter['content']
                    ?? $chapter['main']
                    ?? null;

                $chapterModel = ResearchChapter::create([
                    'research_id'    => $research->id,
                    'chapter_number' => $index + 1,
                    'title'          => $chapterTitle,
                    'content'        => $chapterContent
                ]);

                /* ===== COST TABLE ===== */
                if (isset($chapter['cost']) && is_array($chapter['cost'])) {

                    $table = ResearchChapterTable::create([
                        'research_chapter_id' => $chapterModel->id,
                        'headers' => ['Activities','Item Description','Qty','Unit','Unit Cost'],
                        'has_total' => true
                    ]);

                    foreach ($chapter['cost'] as $row) {

                        if (!is_array($row)) continue;

                        ResearchChapterTableRow::create([
                            'research_chapter_table_id' => $table->id,
                            'cells'     => $row,
                            'row_total' => collect($row)
                                ->filter(fn($v) => is_numeric($v))
                                ->sum()
                        ]);
                    }
                }
            }
        }


        /* =========================================
           SAVE ATTACHMENTS (FIXED)
        ==========================================*/
        if ($request->hasFile('attachments')) {

            foreach ($request->file('attachments') as $file) {

                if (!$file) continue;

                $filePath = $file->store('research_attachments', 'public');

                Attachment::create([
                    'research_id' => $research->id,
                    'filename'    => $file->getClientOriginalName(), // ✅ MATCHES DB
                    'filepath'    => $filePath                      // ✅ MATCHES DB
                ]);
            }
        }


    });

    return redirect()->route('dashboard')
        ->with('success', 'Submitted successfully!');
}

    public function mySubmissions()
{
    $userId = auth()->id();

    // Get all submissions of current user
    $researches = Research::where('user_id', $userId)
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('my_submissions', compact('researches'));
}

public function destroy($id)
{
    $research = Research::findOrFail($id);

    // Delete proponents and attachments first
    $research->proponents()->delete();
    $research->attachments()->delete();

    $research->delete();

    return back()->with('success', 'Draft deleted successfully!');
}

public function show($id)
{
    $research = Research::with([
        'proponents',
        'attachments',
        'chapters.tables.rows'
    ])->findOrFail($id);

    return view('view_research', compact('research'));
}

// Admin Dashboard (summary + chart)
public function adminDashboard()
{
    $user = auth()->user();
    if ($user->role !== 'admin') {
        abort(403, 'Unauthorized');
    }

    // All submitted researches
    $researches = Research::where('status', 'submitted')->get();

    $totalProponents = $researches->sum(fn($r) => $r->proponents->count());
    $totalAttachments = $researches->sum(fn($r) => $r->attachments->count());

    /* ======================================
       CHART DATA - LAST 30 DAYS SUBMISSIONS
    =======================================*/

    $chartData = Research::where('status', 'submitted')
        ->where('created_at', '>=', now()->subDays(30))
        ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
        ->groupBy('date')
        ->orderBy('date')
        ->pluck('total', 'date');

    $chartLabels = $chartData->keys();
    $chartValues = $chartData->values();

    return view('admin_dashboard', compact(
        'researches',
        'totalProponents',
        'totalAttachments',
        'chartLabels',
        'chartValues'
    ));
}

// List of submitted researches (table)
public function adminSubmissionsList()
{
    $researches = Research::with(['user', 'proponents'])
        ->where('status', 'submitted')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('admin_submissions', compact('researches'));
}

// Show the research detail in template format
public function showAdminSubmission($id)
{
    $research = Research::with([
        'proponents',
        'attachments',
        'chapters.tables.rows' // ✅ Fetch chapters with tables and rows
    ])->findOrFail($id);

    return view('admin_submission_detail', compact('research'));
}


public function downloadResearchTemplate($id)
{
    $research = Research::with([
        'proponents',
        'chapters.tables.rows'
    ])->findOrFail($id);

    $templatePath = storage_path('app/templates/research_template.docx');

    if (!file_exists($templatePath)) {
        abort(404, 'Template not found.');
    }

    $templateProcessor = new TemplateProcessor($templatePath);

    /* =====================================
       BASIC DETAILS
    ===================================== */
    $templateProcessor->setValue('title', $research->title);
    $templateProcessor->setValue('school', $research->school);
    $templateProcessor->setValue('type', ucfirst($research->research_type));
    $templateProcessor->setValue('classification', ucfirst($research->classification));

    /* =====================================
       PROPONENTS BLOCK
    ===================================== */
    if ($research->proponents->count() > 0) {

        $templateProcessor->cloneBlock(
            'proponents_block',
            $research->proponents->count(),
            true,
            true
        );

        foreach ($research->proponents as $index => $proponent) {
            $templateProcessor->setValue(
                "proponent_name#" . ($index + 1),
                $proponent->name
            );
            $templateProcessor->setValue(
                "proponent_position#" . ($index + 1),
                $proponent->position
            );
        }

    } else {
        $templateProcessor->deleteBlock('proponents_block');
    }

    /* =====================================
       CHAPTERS BLOCK
    ===================================== */
    if ($research->chapters->count() > 0) {

        $templateProcessor->cloneBlock(
            'chapters_block',
            $research->chapters->count(),
            true,
            true
        );

        foreach ($research->chapters as $cIndex => $chapter) {

            $chapterIndex = $cIndex + 1;

            $templateProcessor->setValue(
                "chapter_number#{$chapterIndex}",
                $chapter->chapter_number
            );

            $templateProcessor->setValue(
                "chapter_content#{$chapterIndex}",
                strip_tags($chapter->content)
            );

            /* =====================================
               BUILD REAL WORD TABLE
            ===================================== */

            $tables = $chapter->tables;

            if ($tables->count() > 0) {

                $phpWord = new PhpWord();

                $tableStyle = [
                    'borderSize' => 6,
                    'borderColor' => '000000',
                    'cellMargin' => 50,
                ];

                $firstTable = true;
                $complexBlock = null;

                foreach ($tables as $tableData) {

                    $table = new Table($tableStyle);

                    // HEADERS
                    $headers = is_array($tableData->headers)
                        ? $tableData->headers
                        : json_decode($tableData->headers, true);

                    if ($headers) {
                        $table->addRow();
                        foreach ($headers as $header) {
                            $table->addCell()->addText(
                                $header,
                                ['bold' => true]
                            );
                        }
                    }

                    // ROWS
                    foreach ($tableData->rows as $row) {

                        $cells = is_array($row->cells)
                            ? $row->cells
                            : json_decode($row->cells, true);

                        if ($cells) {
                            $table->addRow();
                            foreach ($cells as $cell) {
                                $table->addCell()->addText($cell);
                            }
                        }
                    }

                    // Assign first table to placeholder
                    if ($firstTable) {
                        $complexBlock = $table;
                        $firstTable = false;
                    }
                }

                $templateProcessor->setComplexBlock(
                    "table_content#{$chapterIndex}",
                    $complexBlock
                );

            } else {

                $templateProcessor->setValue(
                    "table_content#{$chapterIndex}",
                    ''
                );
            }
        }

    } else {
        $templateProcessor->deleteBlock('chapters_block');
    }

    /* =====================================
       SAVE & DOWNLOAD
    ===================================== */

    $fileName = 'Research_' . $research->id . '.docx';
    $savePath = storage_path('app/public/' . $fileName);

    $templateProcessor->saveAs($savePath);

    return response()->download($savePath)->deleteFileAfterSend(true);
}

public function saveFeedback(Request $request, $id)
{
    $request->validate([
        'feedback' => 'required|string'
    ]);

    $research = Research::findOrFail($id);
    $research->feedback = $request->feedback;
    $research->save();

    return back()->with('success', 'Feedback saved successfully!');
}

// =============================
// ADMIN - RESEARCHES PAGE
// =============================
public function adminResearches()
{
    $researches = Research::with('user')
        ->where('status', 'submitted')
        ->latest()
        ->get();

    return view('admin_researches', compact('researches'));
}

// =============================
// ADMIN - PROPONENTS PAGE
// =============================
public function adminProponents()
{
    $proponents = Proponent::with('research')
        ->latest()
        ->get();

    return view('admin_proponents', compact('proponents'));
}

// =============================
// ADMIN - ATTACHMENTS PAGE
// =============================
public function adminAttachments()
{
    $attachments = Attachment::with('research')
        ->latest()
        ->get();

    return view('admin_attachments', compact('attachments'));
}

// =============================
// SAVE CHAPTER REVIEW
// =============================
public function saveChapterReview(Request $request, $chapterId)
{
    $request->validate([
        'admin_feedback' => 'nullable|string',
        'review_status'  => 'required|in:Pending,Approved,Needs Revision'
    ]);

    $chapter = ResearchChapter::findOrFail($chapterId);

    $chapter->admin_feedback = $request->admin_feedback;
    $chapter->review_status  = $request->review_status;
    $chapter->save();

    return back()->with('success', 'Chapter review saved successfully!');
}

// =============================
// SAVE TABLE REVIEW
// =============================
public function saveTableReview(Request $request, $tableId)
{
    $request->validate([
        'admin_feedback' => 'nullable|string',
        'review_status'  => 'required|in:Pending,Approved,Needs Revision'
    ]);

    $table = ResearchChapterTable::findOrFail($tableId);

    $table->admin_feedback = $request->admin_feedback;
    $table->review_status  = $request->review_status;
    $table->save();

    return back()->with('success', 'Table review saved successfully!');
}

// =============================
// SAVE ATTACHMENT REVIEW
// =============================
public function saveAttachmentReview(Request $request, $attachmentId)
{
    $request->validate([
        'admin_feedback' => 'nullable|string',
        'review_status'  => 'required|in:Pending,Approved,Needs Revision'
    ]);

    $attachment = Attachment::findOrFail($attachmentId);

    $attachment->admin_feedback = $request->admin_feedback;
    $attachment->review_status  = $request->review_status;
    $attachment->save();

    return back()->with('success', 'Attachment review saved successfully!');
}

// =============================
// USER DASHBOARD
// =============================
public function dashboard()
{
    $userId = auth()->id();

    /* ===============================
       TOTAL SUBMISSIONS & DRAFTS
    ================================*/
    $totalSubmissions = Research::where('user_id', $userId)
        ->where('status', 'submitted')
        ->count();

    $totalDrafts = Research::where('user_id', $userId)
        ->where('status', 'draft')
        ->count();

    /* ===============================
       GET ALL USER RESEARCH IDS
    ================================*/
    $researchIds = Research::where('user_id', $userId)->pluck('id');

    $chapterIds = ResearchChapter::whereIn('research_id', $researchIds)->pluck('id');

    /* ===============================
       COUNT APPROVED / PENDING / RETURNED
    ================================*/

    // Chapters
    $approvedChapters = ResearchChapter::whereIn('research_id', $researchIds)
        ->where('review_status', 'Approved')->count();

    $pendingChapters = ResearchChapter::whereIn('research_id', $researchIds)
        ->where('review_status', 'Pending')->count();

    $returnedChapters = ResearchChapter::whereIn('research_id', $researchIds)
        ->where('review_status', 'Needs Revision')->count();

    // Tables
    $approvedTables = ResearchChapterTable::whereIn('research_chapter_id', $chapterIds)
        ->where('review_status', 'Approved')->count();

    $pendingTables = ResearchChapterTable::whereIn('research_chapter_id', $chapterIds)
        ->where('review_status', 'Pending')->count();

    $returnedTables = ResearchChapterTable::whereIn('research_chapter_id', $chapterIds)
        ->where('review_status', 'Needs Revision')->count();

    // Attachments
    $approvedAttachments = Attachment::whereIn('research_id', $researchIds)
        ->where('review_status', 'Approved')->count();

    $pendingAttachments = Attachment::whereIn('research_id', $researchIds)
        ->where('review_status', 'Pending')->count();

    $returnedAttachments = Attachment::whereIn('research_id', $researchIds)
        ->where('review_status', 'Needs Revision')->count();

        // Fetch recent activities (latest 10)
    $recentActivities = ActivityLog::where('user_id', $userId)
                        ->latest()
                        ->take(10)
                        ->get();

    /* ===============================
       FINAL TOTALS
    ================================*/
    $approvedSections =
        $approvedChapters +
        $approvedTables +
        $approvedAttachments;

    $pendingReviews =
        $pendingChapters +
        $pendingTables +
        $pendingAttachments;

    $returnedSections =
        $returnedChapters +
        $returnedTables +
        $returnedAttachments;

    return view('dashboard', compact(
        'totalSubmissions',
        'totalDrafts',
        'approvedSections',
        'pendingReviews',
        'returnedSections',
        'recentActivities'
    ));
}

public function edit($id)
{
    $research = Research::with(['proponents', 'attachments', 'chapters.tables.rows'])->findOrFail($id);

    // Check if current user owns this draft
    if ($research->user_id !== auth()->id()) {
        abort(403, 'Unauthorized');
    }

    return view('submit_paper', compact('research'));
}
}
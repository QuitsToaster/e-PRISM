<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Proponent;
use App\Models\Attachment;
use App\Models\ResearchChapter;
use App\Models\ResearchChapterTable;
use App\Models\ResearchChapterTableRow;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;

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
        ->with('success', 'Saved successfully!');
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

// Admin Dashboard (summary)
public function adminDashboard()
{
    $user = auth()->user();
    if ($user->role !== 'admin') {
        abort(403, 'Unauthorized');
    }

    $researches = Research::where('status', 'submitted')->get();

    // Optional: counts for placeholders
    $totalProponents = $researches->sum(fn($r) => $r->proponents->count());
    $totalAttachments = $researches->sum(fn($r) => $r->attachments->count());

    return view('admin_dashboard', compact('researches', 'totalProponents', 'totalAttachments'));
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

// Download the research as Word file (Option B)
public function downloadResearchTemplate($id)
{
    $research = Research::with(['proponents', 'attachments'])->findOrFail($id);

    $templatePath = storage_path('app/templates/research_template.docx');
    $templateProcessor = new TemplateProcessor($templatePath);

    // Replace placeholders in Word: e.g. ${title}, ${school}, ${user_id}
    $templateProcessor->setValue('title', $research->title);
    $templateProcessor->setValue('school', $research->school);
    $templateProcessor->setValue('user_id', $research->user_id);
    $templateProcessor->setValue('type', ucfirst($research->research_type));
    $templateProcessor->setValue('classification', ucfirst($research->classification));

    // Proponents example: just first three for simplicity
    $proponents = $research->proponents->take(3);
    foreach($proponents as $i => $p){
        $templateProcessor->setValue("proponent_name_".($i+1), $p->name);
        $templateProcessor->setValue("proponent_position_".($i+1), $p->position);
    }

    $fileName = 'research_'.$research->id.'.docx';
    $templateProcessor->saveAs(storage_path('app/public/'.$fileName));

    return response()->download(storage_path('app/public/'.$fileName));
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


}
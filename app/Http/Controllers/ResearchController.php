<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Proponent;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;

class ResearchController extends Controller
{
    public function create() {
        return view('submit_paper');
    }
public function store(Request $request) {
    $request->validate([
        'classification' => 'required',
        'research_type' => 'required',
        'school' => 'required',
        'title' => 'required',
        'proponents.*.name' => 'required',
        'proponents.*.position' => 'required',
        'proponents.*.photo' => 'image|mimes:jpg,jpeg,png|max:2048',
        'attachments.*' => 'mimes:pdf|max:5120'
    ]);

    // Get action from form (draft or submitted)
    $status = $request->input('action');
    if (!in_array($status, ['draft', 'submitted'])) {
        $status = 'draft';
    }

    // Save main research
    $research = Research::create([
        'user_id' => auth()->id(),
        'classification' => $request->classification,
        'research_type' => $request->research_type,
        'school' => $request->school,
        'school_id' => $request->school_id,
        'title' => $request->title,
        'chapters' => $request->chapters ?? [],
        'status' => $status
    ]);

    // Save proponents
    if ($request->has('proponents')) {
        foreach ($request->proponents as $p) {
            $photoPath = isset($p['photo']) ? $p['photo']->store('proponents', 'public') : null;
            Proponent::create([
                'research_id' => $research->id,
                'name' => $p['name'],
                'position' => $p['position'],
                'photo' => $photoPath
            ]);
        }
    }

    // Save attachments
    if ($request->hasFile('attachments')) {
        foreach ($request->file('attachments') as $file) {
            $filename = $file->store('attachments', 'public');
            Attachment::create([
                'research_id' => $research->id,
                'filename' => $filename
            ]);
        }
    }

    return redirect()->route('dashboard')->with('success', 
        $status === 'draft' ? 'Draft saved successfully!' : 'Research submitted successfully!'
    );
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
    $research = Research::with('proponents', 'attachments')->findOrFail($id);
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
    $research = Research::with(['proponents', 'attachments'])->findOrFail($id);

    // Pass the research object to the Blade
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
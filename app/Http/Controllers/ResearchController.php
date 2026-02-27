<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Research;
use App\Models\Proponent;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;

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

       $status = $request->input('action'); // should be 'draft' or 'submitted'

// Default to draft if not provided
if (!in_array($status, ['draft', 'submitted'])) {
    $status = 'draft';
}

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
        // 2️⃣ Save proponents
        if ($request->has('proponents')) {
            foreach ($request->proponents as $p) {
                $photoPath = null;
                if (isset($p['photo'])) {
                    $photoPath = $p['photo']->store('proponents', 'public');
                }
                Proponent::create([
                    'research_id' => $research->id,
                    'name' => $p['name'],
                    'position' => $p['position'],
                    'photo' => $photoPath
                ]);
            }
        }

        // 3️⃣ Save attachments
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = $file->store('attachments', 'public');
                Attachment::create([
                    'research_id' => $research->id,
                    'filename' => $filename
                ]);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Research submitted successfully!');
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
}
<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResearchController;

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth Routes
Route::get('signup', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('signup', [AuthController::class, 'signup'])->name('signup');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (after login)
Route::get('dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'admin') { // <-- corrected here
        return redirect()->route('admin.dashboard');
    }
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Submit Paper Page
Route::get('submit-paper', function() {
    return view('submit_paper'); 
})->middleware('auth')->name('submit.paper');

// My Submissions Page
Route::get('my-submissions', function() {
    return view('my_submissions'); 
})->middleware('auth')->name('my.submissions');

// Profile Page
Route::get('profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

// Update Profile
Route::put('profile', [AuthController::class, 'updateProfile'])->middleware('auth')->name('profile.update');

// Help & Guides Page
Route::get('help-guides', function () {
    return view('help_guides');
})->middleware('auth')->name('help.guides');

// Research Routes
Route::get('/submit-paper', [ResearchController::class, 'create'])->name('submit.paper');
Route::post('/submit-paper', [ResearchController::class, 'store']);
Route::get('/my-submissions', [ResearchController::class, 'mySubmissions'])->name('my.submissions');
Route::delete('/research/{id}', [ResearchController::class, 'destroy'])->name('research.delete');
Route::get('/research/{id}', [ResearchController::class, 'show'])->name('research.show');

Route::middleware('auth')->group(function () {
    // Admin Dashboard (summary/graphs placeholder)
    Route::get('/admin-dashboard', [ResearchController::class, 'adminDashboard'])->name('admin.dashboard');

    // Admin Submitted Papers List
    Route::get('/admin-submissions', [ResearchController::class, 'adminSubmissionsList'])->name('admin.submissions.list');

    // Admin Feedback
    Route::post('/admin-submissions/{id}/feedback', [ResearchController::class, 'saveFeedback'])->name('admin.feedback');

    // Single research detail view
    Route::get('/admin-submissions/{id}', [ResearchController::class, 'showAdminSubmission'])->name('admin.submissions.show');

    Route::get('/admin-submissions/{id}/download', [ResearchController::class, 'downloadResearchTemplate'])
     ->name('admin.research.download');

     Route::post('/admin/chapter-review/{chapterId}',
    [ResearchController::class, 'saveChapterReview']
)->name('admin.chapter.review');

     // Admin Summary Pages
    Route::get('/admin/researches', [ResearchController::class, 'adminResearches'])->name('admin.researches');
    Route::get('/admin/proponents', [ResearchController::class, 'adminProponents'])->name('admin.proponents');
    Route::get('/admin/attachments', [ResearchController::class, 'adminAttachments'])->name('admin.attachments');

    Route::post('/admin/table-review/{tableId}',
    [ResearchController::class, 'saveTableReview']
)->name('admin.table.review');

Route::post('/admin/attachment-review/{attachmentId}',
    [ResearchController::class, 'saveAttachmentReview']
)->name('admin.attachment.review');

Route::get('/dashboard', [ResearchController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware('auth');

// Edit Draft
Route::get('/submit-paper/{id}/edit', [ResearchController::class, 'edit'])->middleware('auth')->name('submit.paper.edit');
});
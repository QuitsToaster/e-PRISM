<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('submit-paper', function() {
    return "Submit Paper Page (to be implemented)";
})->middleware('auth')->name('submit.paper');

Route::get('my-submissions', function() {
    return "My Submissions Page (to be implemented)";
})->middleware('auth')->name('my.submissions');
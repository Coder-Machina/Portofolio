<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ===== ROUTES PUBLIQUES =====
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// ===== ROUTES ADMIN =====
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('skills', App\Http\Controllers\Admin\SkillController::class);
    Route::resource('messages', App\Http\Controllers\Admin\MessageController::class)->only(['index', 'show', 'destroy']);
    Route::post('messages/{message}/toggle-read', [App\Http\Controllers\Admin\MessageController::class, 'toggleRead'])->name('messages.toggle-read');
});

// Provide a named `dashboard` route (Breeze expects this) that redirects to the admin dashboard
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth')->name('dashboard');

// ===== BREEZE =====
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

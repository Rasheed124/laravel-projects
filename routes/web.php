<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| 1. Public / Guest Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/blog', [PageController::class, 'blog'])->name('frontend.blog');
Route::get('/blog/{slug}', [PageController::class, 'show'])->name('frontend.single');
Route::get('/contact', [PageController::class, 'contact'])->name('frontend.contact');

/*
|--------------------------------------------------------------------------
| 2. Authenticated & Verified Control Panel Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Core Dashboard Base
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Content Pipeline Management (Custom actions MUST precede resource declaration)
    Route::patch('posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::resource('posts', PostController::class)->except(['show']);

    // Profile Settings Subdomain Context Group
    Route::prefix('profile')->as('profile.')->group(function () {
        Route::get('/settings', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/settings', [ProfileController::class, 'update'])->name('update');
        Route::delete('/settings', [ProfileController::class, 'destroy'])->name('destroy');
        Route::get('/notifications', [ProfileController::class, 'notification'])->name('notifications');
    });

});

/*
|--------------------------------------------------------------------------
| 3. Core Auth Subsystem
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
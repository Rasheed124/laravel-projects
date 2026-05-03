<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // All routes inside here will start with /profile/
    Route::prefix('profile')->as('profile.')->group(function () {

        Route::get('/settings', [ProfileController::class, 'edit'])->name('edit');

        Route::patch('/settings', [ProfileController::class, 'update'])->name('update');

        Route::delete('/settings', [ProfileController::class, 'destroy'])->name('destroy');

        // URL: /profile/notifications | Route Name: profile.notifications
        Route::get('/notifications', [ProfileController::class, 'notification'])->name('notifications');
    });

});



require __DIR__ . '/auth.php';

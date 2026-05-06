<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('profile')->as('profile.')->group(function () {

        Route::get('/settings', [ProfileController::class, 'edit'])->name('edit');

        Route::patch('/settings', [ProfileController::class, 'update'])->name('update');

        Route::delete('/settings', [ProfileController::class, 'destroy'])->name('destroy');

        Route::get('/notifications', [ProfileController::class, 'notification'])->name('notifications');
    });

});

require __DIR__ . '/auth.php';

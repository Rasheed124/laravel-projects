<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class);

Route::resource('/contacts', ContactController::class);
Route::delete('/contacts/{contact}/restore', [ContactController::class, 'restore'])->name('contacts.restore')->withTrashed();
Route::delete('/contacts/{contact}/force-delete', [ContactController::class, 'forceDelete'])->name('contacts.force-delete')->withTrashed();

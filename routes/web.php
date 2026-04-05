<?php

use App\Http\Controllers\ActivityController;
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

// Route::get('/contacts', [ContactController::class, 'store'])->name('contacts.store');
// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');

// Route::controller(ContactController::class)->name('contacts.')->group(function () {

//     Route::get('/contacts', 'index')->name('index');
//     Route::get('/contacts/create', 'create')->name('create');
//     Route::post('/contacts', 'store')->name('store');
//     Route::get('/contacts/{id}', 'show')->name('show');
//     Route::get('/contacts/edit/{id}', 'edit')->name('edit');
//     Route::put('/contacts/{id}', 'update')->name('update');
//     Route::delete('/contacts/{id}', 'destroy')->name('destroy');

// });

Route::resource('/contacts', ContactController::class);

// Route::resource('companies', CompanyController::class);
// Route::resources([
//     'tags'  => TagController::class,
//     'tasks' => TaskController::class,
// ]);

// Route::resource('contact.notes',  ContactNoteController::class)->shallow();

// Route::resource('/activities', ActivityController::class)->except([
//     'index', 'show'
// ]);
// Route::resource('/activities', ActivityController::class)->names([
//     'index' => 'activities.all',
//     'show' => 'activities.view'
// ]);
Route::resource('/activities', ActivityController::class)->parameters([
    'activities' => 'active',
]);

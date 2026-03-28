<?php

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

Route::get('/', function () {
    return view('welcome');
});

function getContacts()
{
    return [
        1 => ['id' => 1, 'name' => 'Name 1', 'phone' => '1234567890'],
        2 => ['id' => 2, 'name' => 'Name 2', 'phone' => '2345678901'],
        3 => ['id' => 3, 'name' => 'Name 3', 'phone' => '3456789012'],
    ];
}
Route::get('/contacts', function () {

    $contacts = getContacts();

    $companies = [
        1 => ['name' => 'Company One', 'contacts' => 3],
        2 => ['name' => 'Company One', 'contacts' => 3],
    ];

    return view('contacts.index', compact('contacts', 'companies'));

})->name('contacts.index');

Route::get('/contacts/create', function () {

    $contacts = [
        1 => ['name' => 'Name 1', 'phone' => '1234567890'],
        2 => ['name' => 'Name 2', 'phone' => '2345678901'],
        3 => ['name' => 'Name 3', 'phone' => '3456789012'],
    ];
    return view('contacts.create', compact('contacts'));

})->name('contacts.create');

Route::get('/contacts/show', function () {

    $contacts = [
        1 => ['name' => 'Name 1', 'phone' => '1234567890'],
        2 => ['name' => 'Name 2', 'phone' => '2345678901'],
        3 => ['name' => 'Name 3', 'phone' => '3456789012'],
    ];
    return view('contacts.show', compact('contacts'));

})->name('contacts.show');

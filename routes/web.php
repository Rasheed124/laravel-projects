<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sheets\Facades\Sheets;

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

Route::get('/posts', function () {

    $postsRepository = Sheets::collection('posts')->all();


    return view('posts.index', ['postsRepo' => $postsRepository]);
});

Route::post('/posts/{post}', function ($post) {
    return view('posts.show', ['post' => $post]);
});

// Route::get('/{shortcode}', [LinkController::class, 'restore']);

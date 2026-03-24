<?php

use App\Models\Post;
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

Route::get('/', function () {

    $postsRepository = Sheets::collection('posts')->all();

    return view('posts.index', ['postsRepo' => $postsRepository]);
});

Route::get('/posts/{slug}', function ($slug) {
    $post = Sheets::collection('posts')->all()->where('slug', $slug)->first();

    abort_if(is_null($post), 404);

    return view('posts.show', ['post' => $post]);
});

Route::get('/author/{author}', function ($author) {
    $posts = Sheets::collection('posts')->all()->filter(fn(Post $post) => $post->author === $author);

    return view('author.show',

        [
            'posts'      => $posts,
            'authorName' => $posts->first()->author_name,

        ]);

});
// Route::get('/tags/{tag}', function ($tag) {
//     $posts = Sheets::collection('posts')->all()->filter(fn(Post $post) => in_array($tag, $post->tags));

//     return view('tags.show',

//         [
//             'posts' => $posts,
//             'tag'  => $tag,

//         ]);

// });

Route::get('/tags/{tag}', function ($tag) {


    $posts = Sheets::collection('posts')
        ->all()
        ->filter(function (Post $post) use ($tag) {
            return collect($post->tags)
                ->map(fn($t) => strtolower($t))
                ->contains(strtolower($tag));
        });

    return view('tags.show', [
        'posts' => $posts,
        'tag'   => $tag,
    ]);
});

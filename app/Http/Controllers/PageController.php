<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Fetch the latest highlighted featured post
        $featuredPost = Post::with(['user', 'category'])
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        // Fetch the 3 most recent posts, excluding the featured one if it exists
        $recentPosts = Post::with(['user', 'category'])
            ->where('status', 'published')
            ->when($featuredPost, function ($query) use ($featuredPost) {
                return $query->where('id', '!=', $featuredPost->id);
            })
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('home', compact('featuredPost', 'recentPosts'));
    }


public function blog(Request $request)
{
    $query = Post::with(['user', 'category'])
        ->where('status', 'published');

    // Optional category filtering logic fallback
    if ($request->has('category')) {
        $query->whereHas('category', function($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }

    $posts = $query->latest('published_at')->paginate(9);
    $categories = Category::withCount('posts')->orderBy('name')->get();

    return view('frontend.blog', compact('posts', 'categories'));
}
    public function show($slug) { return view('frontend.single'); }
    public function contact() { return view('frontend.contact'); }
}
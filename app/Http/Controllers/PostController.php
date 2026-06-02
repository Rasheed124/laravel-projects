<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        // Admin handles all entries; author views restricted context
        $query = Auth::user()->role === 'admin' 
            ? Post::with(['user', 'category']) 
            : Post::where('user_id', Auth::id())->with(['user', 'category']);

        if ($request->has('trash')) {
            $query->onlyTrashed();
        }

        $posts = $query->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        /** @var \App\Models\User $user */
       $user = Auth::user();
        $user->posts()->create($validated);
        // Auth::user()->posts()->create($validated);

        return redirect()->route('posts.index')->with('success', 'Post recorded successfully!');
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::orderBy('name')->get();
        
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'is_featured' => 'nullable|boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post parameters updated.');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete(); 

        return redirect()->route('posts.index')->with('success', 'Post moved to trash.');
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $this->authorize('restore', $post);
        $post->restore();

        return redirect()->route('posts.index')->with('success', 'Post restored safely.');
    }
}
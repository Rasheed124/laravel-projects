<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $postsData = Post::select('created_at')
            ->where('created_at', '>=', now()->subMonths(6))
            ->get()
            ->groupBy(function ($post) {
                return $post->created_at->format('m-01-Y');
            });

        $labels = [];
        $data   = [];

        for ($i = 5; $i >= 0; $i--) {
            $month    = now()->subMonths($i)->format('m-01-Y');
            $labels[] = $month;
            $data[]   = isset($postsData[$month]) ? $postsData[$month]->count() : 0;
        }

        $recentPosts = Post::with(['category'])
            ->withCount('comments')
            ->latest()
            ->take(5)
            ->get();

        $stats = [
            'posts_count'      => Post::count(),
            'comments_count'   => Comment::count(),
            'categories_count' => Category::count(),
        ];

        return view('dashboard', compact('labels', 'data', 'recentPosts', 'stats'));
    }
}

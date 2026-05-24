<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Build Historical Pipelines (6-Month Range)
        $postsQuery = Post::select('created_at', 'views')
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->get();

        $commentsQuery = Comment::select('created_at')
            ->where('created_at', '>=', now()->subMonths(5)->startOfMonth())
            ->get();

        // Group queries by month identifier keys
        $groupedPosts    = $postsQuery->groupBy(fn($p) => $p->created_at->format('Y-m'));
        $groupedComments = $commentsQuery->groupBy(fn($c) => $c->created_at->format('Y-m'));

        $labels       = [];
        $articlesData = [];
        $commentsData = [];
        $viewsData    = [];

        // Generate matching timeline keys across all charts
        for ($i = 5; $i >= 0; $i--) {
            $monthKey = now()->subMonths($i)->format('Y-m');

            $labels[]       = now()->subMonths($i)->format('M Y');
            $articlesData[] = isset($groupedPosts[$monthKey]) ? $groupedPosts[$monthKey]->count() : 0;
            $commentsData[] = isset($groupedComments[$monthKey]) ? $groupedComments[$monthKey]->count() : 0;
            $viewsData[]    = isset($groupedPosts[$monthKey]) ? $groupedPosts[$monthKey]->sum('views') : 0;
        }

        // 2. Recent Posts Execution Matrix
        $recentPosts = Post::with(['category'])
            ->withCount('comments')
            ->latest()
            ->take(5)
            ->get();

        // 3. Extract Distribution data for Top Categories
        $topCategories = Category::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(4)
            ->get();

        // 4. Global Counter Pipeline
        $stats = [
            'posts_count'    => Post::count(),
            'comments_count' => Comment::count(),
            'total_views'    => Post::sum('views') ?? 0,
            'total_likes'    => Post::sum('likes') ?? 0,
        ];

        // 5. Recent Activity Collection
        $recentActivities = Comment::with(['user', 'post'])->latest()->take(3)->get();

        // 6. Top Countries Query Integration
        $topCountryMetrics = Post::join('users', 'posts.user_id', '=', 'users.id')
            ->select('users.country', DB::raw('count(posts.id) as posts_count'))
            ->whereNotNull('users.country')
            ->groupBy('users.country')
            ->orderBy('posts_count', 'desc')
            ->take(3)
            ->get();

        $countryLabels = $topCountryMetrics->pluck('country')->toArray();
        $countryData   = $topCountryMetrics->pluck('posts_count')->toArray();

        if (empty($countryLabels)) {
            $countryLabels = ['Unknown Country'];
            $countryData   = [0];
        }

        return view('dashboard', compact(
            'labels',
            'articlesData',
            'commentsData',
            'viewsData',
            'recentPosts',
            'topCategories',
            'stats',
            'recentActivities',
            'countryLabels',
            'countryData'
        ));
    }
}

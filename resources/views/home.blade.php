<x-guest-layout title="Home">

    <div class="relative bg-white border-b border-gray-100 overflow-hidden py-20 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
            <span
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-violet-50 text-violet-700 mb-4">
                The Nest of Thoughts
            </span>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-gray-900 mb-6">
                Discover ideas that shape the <span class="text-violet-600">future</span>.
            </h1>
            <p class="text-lg sm:text-xl text-gray-500 mb-8 leading-relaxed">
                Join our collective of independent writers sharing stories across engineering, creative design, product
                strategies, and cultural reviews.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('frontend.blog') }}"
                    class="px-6 py-3 bg-violet-600 text-white font-medium rounded-xl hover:bg-violet-700 transition shadow-sm">Explore
                    Articles</a>
                <a href="{{ route('frontend.contact') }}"
                    class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition">Get
                    in Touch</a>
            </div>
        </div>
    </div>

    @if ($featuredPost)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="mb-6">
                <h2 class="text-xl font-bold text-gray-900 uppercase tracking-wide">🔥 Spotlight Entry</h2>
            </div>

            <div
                class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden grid lg:grid-cols-12 gap-0">
                <div
                    class="lg:col-span-7 bg-gray-100 min-h-[300px] flex items-center justify-center text-gray-300 relative">
                    @if ($featuredPost->featured_image)
                        <img src="{{ asset('storage/' . $featuredPost->featured_image) }}" alt="Cover"
                            class="absolute inset-0 w-full h-full object-cover">
                    @else
                        <span class="text-6xl">📝</span>
                    @endif
                </div>
                <div class="lg:col-span-5 p-8 lg:p-12 flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-violet-600 uppercase tracking-wider block mb-2">
                            {{ $featuredPost->category->name ?? 'General' }}
                        </span>
                        <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4 hover:text-violet-600 transition">
                            <a href="{{ route('frontend.single', $featuredPost->slug) }}">{{ $featuredPost->title }}</a>
                        </h3>
                        <p class="text-gray-500 line-clamp-4 text-sm sm:text-base leading-relaxed mb-6">
                            {{ $featuredPost->excerpt ?? Str::limit(strip_tags($featuredPost->content), 180) }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 border-t border-gray-50 pt-6">
                        <div
                            class="w-10 h-10 rounded-full bg-violet-100 flex items-center justify-center text-sm font-bold text-violet-700">
                            {{ strtoupper(substr($featuredPost->user->name, 0, 2)) }}
                        </div>
                        <div>
                            <span
                                class="block text-sm font-semibold text-gray-900">{{ $featuredPost->user->name }}</span>
                            <span
                                class="block text-xs text-gray-400">{{ $featuredPost->published_at?->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Latest Stories</h2>
                <p class="text-sm text-gray-400 mt-1">Freshly published insights from our authors.</p>
            </div>
            <a href="{{ route('frontend.blog') }}"
                class="text-sm font-semibold text-violet-600 hover:text-violet-700 transition">View all →</a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($recentPosts as $post)
                <article
                    class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between hover:translate-y-[-4px] transition duration-200">
                    <div>
                        <div
                            class="h-48 bg-gray-100 relative overflow-hidden flex items-center justify-center text-gray-300">
                            @if ($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Cover"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <span class="text-4xl">📄</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <span class="text-xs font-bold text-violet-600 uppercase tracking-wider block mb-2">
                                {{ $post->category->name ?? 'General' }}
                            </span>
                            <h3
                                class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 hover:text-violet-600 transition">
                                <a href="{{ route('frontend.single', $post->slug) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed">
                                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="px-6 pb-6 pt-4 border-t border-gray-50 flex items-center justify-between text-xs text-gray-400">
                        <span class="font-medium text-gray-700">{{ $post->user->name }}</span>
                        <span>{{ $post->published_at?->format('M d, Y') }}</span>
                    </div>
                </article>
            @empty
                <div class="sm:col-span-2 lg:col-span-3 text-center py-12 text-gray-400">
                    No articles found. Check back later!
                </div>
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('frontend.blog') }}"
                class="inline-flex items-center justify-center px-6 py-3 bg-violet-600 text-white font-medium rounded-xl hover:bg-violet-700  shadow-sm transition-all duration-200 group">
                <span>View More Articles</span>
                <svg class="w-4 h-4 ml-1.5 fill-current transform group-hover:translate-x-1 transition-transform duration-200"
                    viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.59 12.41L13.17 7.83A1 1 0 0 0 13.17 6.41L8.59 1.83a1 1 0 0 0-1.42 1.42L10.76 7H2a1 1 0 0 0 0 2h8.76l-3.59 3.59a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0z" />
                </svg>
            </a>
        </div>
    </div>
</x-guest-layout>

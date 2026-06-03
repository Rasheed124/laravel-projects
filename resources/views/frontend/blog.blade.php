<x-guest-layout title="Our Blog">
    <div class="bg-white border-b border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight text-gray-900">
                The Knowledge Base
            </h1>
            <p class="text-sm md:text-base text-gray-500 mt-2 max-w-2xl">
                Deep dives, engineering updates, and cultural insights curated by our development team and designers.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-12 gap-12">
            
            <main class="lg:col-span-8">
                @if($posts->count() > 0)
                    <div class="grid sm:grid-cols-2 gap-8">
                        @foreach($posts as $post)
                            <article class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden flex flex-col justify-between hover:translate-y-[-2px] transition duration-200">
                                <div>
                                    <div class="h-44 bg-gray-100 relative overflow-hidden flex items-center justify-center text-gray-300">
                                        @if($post->featured_image)
                                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="Cover Image" class="absolute inset-0 w-full h-full object-cover">
                                        @else
                                            <span class="text-4xl">📄</span>
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <span class="text-xs font-bold text-violet-600 uppercase tracking-wider block mb-2">
                                            {{ $post->category->name ?? 'General' }}
                                        </span>
                                        <h2 class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 hover:text-violet-600 transition">
                                            <a href="{{ route('frontend.single', $post->slug) }}">{{ $post->title }}</a>
                                        </h2>
                                        <p class="text-gray-500 text-sm line-clamp-3 leading-relaxed">
                                            {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="px-6 pb-6 pt-4 border-t border-gray-50 flex items-center justify-between text-xs text-gray-400">
                                    <span class="font-medium text-gray-700">{{ $post->user->name }}</span>
                                    <span>{{ $post->published_at?->format('M d, Y') }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="mt-12">
                        {{ $posts->links() }}
                    </div>
                @else
                    <div class="text-center py-20 bg-white rounded-xl border border-gray-100 text-gray-400">
                        <span class="text-4xl block mb-2">📭</span>
                        <p class="font-semibold text-gray-700">No articles found matching parameters</p>
                        <p class="text-xs mt-1">We are currently drafting new content matrices. Check back soon!</p>
                    </div>
                @endif
            </main>

            <aside class="lg:col-span-4 space-y-8">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-sm">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 mb-4">📢 About Our Blog</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Welcome to BlogNest. Here we post our full-stack engineering updates, clean architecture insights, and modern interface design patterns.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl border sticky top-20 border-gray-100 shadow-sm">
                    <h3 class="text-sm font-bold uppercase tracking-wider text-gray-900 mb-4">🗂️ Categories</h3>
                    <nav class="space-y-1">
                        <a href="{{ route('frontend.blog') }}" class="flex justify-between items-center px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ !request('category') ? 'bg-violet-50 text-violet-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <span>All Collections</span>
                        </a>
                        @foreach($categories as $category)
                            @if($category->posts_count > 0)
                                <a href="{{ route('frontend.blog', ['category' => $category->slug]) }}" class="flex justify-between items-center px-3 py-2 rounded-lg text-sm font-medium transition-colors {{ request('category') === $category->slug ? 'bg-violet-50 text-violet-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                    <span>{{ $category->name }}</span>
                                    <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 group-hover:bg-white font-semibold text-gray-500">
                                        {{ $category->posts_count }}
                                    </span>
                                </a>
                            @endif
                        @endforeach
                    </nav>
                </div>
            </aside>

        </div>
    </div>
</x-guest-layout>
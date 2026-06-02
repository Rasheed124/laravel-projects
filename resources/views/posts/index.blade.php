<x-app-layout :title="request()->has('trash') ? 'Trash Bin' : 'All Posts'">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-7xl mx-auto">

        <div class="sm:flex sm:justify-between sm:items-center mb-8">
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">
                    {{ request()->has('trash') ? 'Trash Bin' : 'Post Entries' }}
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    {{ request()->has('trash') ? 'Manage and restore your deleted records.' : 'Create, edit, and track your content pipeline.' }}
                </p>
            </div>

            @if(!request()->has('trash'))
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    <a href="{{ route('posts.create') }}" class="btn bg-violet-500 hover:bg-violet-600 text-white inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm shadow-sm transition-colors">
                        <svg class="w-4 height-4 fill-current opacity-50 shrink-0 mr-2" viewBox="0 0 16 16">
                            <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s1 .4 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                        </svg>
                        <span>Add New Post</span>
                    </a>
                </div>
            @else
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
                    <a href="{{ route('posts.index') }}" class="btn border-gray-200 dark:border-gray-700 hover:border-gray-300 text-gray-600 dark:text-gray-300 inline-flex items-center px-4 py-2 rounded-lg font-medium text-sm transition-all bg-white dark:bg-gray-800">
                        <span>Back to Active Posts</span>
                    </a>
                </div>
            @endif
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-sm flex items-center">
                <svg class="w-4 h-4 shrink-0 mr-2 fill-current" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 8 8A8.009 8.009 0 0 0 8 0zm3.5 6.207L7.207 10.5a1 1 0 0 1-1.414 0L4.5 9.207a1 1 0 0 1 1.414-1.414L6.5 8.293l3.586-3.586a1 1 0 0 1 1.414 1.414z"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl border border-gray-100 dark:border-gray-700/60 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="table-auto w-full dark:text-gray-300 divide-y divide-gray-100 dark:divide-gray-700/60">
                    <thead class="text-xs font-semibold uppercase text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-700/20">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold">Post Details</th>
                            <th class="px-6 py-4 text-left font-semibold">Category</th>
                            <th class="px-6 py-4 text-left font-semibold">Author</th>
                            <th class="px-6 py-4 text-center font-semibold">Status</th>
                            <th class="px-6 py-4 text-center font-semibold">Metrics</th>
                            <th class="px-6 py-4 text-right font-semibold">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                        @forelse($posts as $post)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/10 transition-colors">
                                <td class="px-6 py-4 font-medium text-gray-800 dark:text-gray-100 max-w-xs sm:max-w-md truncate">
                                    <div class="flex items-center space-x-2">
                                        @if($post->is_featured)
                                            <span class="inline-flex shrink-0 px-1.5 py-0.5 text-[10px] uppercase font-bold bg-amber-500/10 text-amber-600 dark:text-amber-400 rounded">
                                                Featured
                                            </span>
                                        @endif
                                        <span class="truncate block font-semibold text-gray-900 dark:text-white" title="{{ $post->title }}">
                                            {{ $post->title }}
                                        </span>
                                    </div>
                                    @if($post->excerpt)
                                        <span class="block text-xs text-gray-400 dark:text-gray-500 mt-0.5 truncate font-normal">
                                            {{ $post->excerpt }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-gray-500 dark:text-gray-400">
                                    {{ $post->user->name ?? 'Unknown Author' }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($post->status === 'published')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 dark:bg-emerald-500/10 text-emerald-700 dark:text-emerald-400">
                                            Published
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 dark:bg-amber-500/10 text-amber-700 dark:text-amber-400">
                                            Draft
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center text-xs space-y-0.5 font-medium">
                                    <div class="text-gray-700 dark:text-gray-300 flex items-center justify-center space-x-1">
                                        <span>👁 {{ number_format($post->views) }}</span>
                                    </div>
                                    <div class="text-gray-400 dark:text-gray-500 flex items-center justify-center space-x-1">
                                        <span>❤️ {{ number_format($post->likes) }}</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if($post->trashed())
                                        <div class="flex items-center justify-end space-x-2">
                                            <form action="{{ route('posts.restore', $post->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-emerald-600 hover:text-emerald-700 dark:text-emerald-400 dark:hover:text-emerald-300 transition-colors">
                                                    Restore
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="text-violet-500 hover:text-violet-600 dark:hover:text-violet-400 transition-colors">Edit</a>
                                            
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Move this post to the trash bin?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-500 hover:text-rose-600 transition-colors">
                                                    Trash
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-gray-400 dark:text-gray-500">
                                    <div class="max-w-sm mx-auto space-y-2">
                                        <svg class="w-8 h-8 mx-auto fill-current text-gray-300 dark:text-gray-600" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 8 8A8.009 8.009 0 0 0 8 0zm0 14a6 6 0 1 1 6-6 6.007 6.007 0 0 1-6 6z"/>
                                        </svg>
                                        <p class="font-semibold text-gray-700 dark:text-gray-300">No entries recorded</p>
                                        <p class="text-xs">There are no post matching this data filter parameter yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $posts->withQueryString()->links() }}
        </div>

    </div>
</x-app-layout>
<x-app-layout title="Create Post">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Write New Post</h1>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6 border border-gray-100 dark:border-gray-700/60">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-800 dark:text-gray-100" for="title">Title</label>
                        <input id="title" name="title" class="form-input w-full px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-transparent dark:text-white focus:border-violet-500 focus:outline-none" type="text" value="{{ old('title') }}" required />
                        @error('title') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1 text-gray-800 dark:text-gray-100" for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-select w-full px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 dark:text-white focus:border-violet-500 focus:outline-none" required>
                                <option value="">Select a Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1 text-gray-800 dark:text-gray-100" for="status">Publication Status</label>
                            <select id="status" name="status" class="form-select w-full px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-white dark:bg-gray-800 dark:text-white focus:border-violet-500 focus:outline-none">
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publish Immediately</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 py-1">
                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="form-checkbox h-4 w-4 text-violet-500 border-gray-200 dark:border-gray-700 rounded focus:ring-violet-500">
                        <label for="is_featured" class="text-sm font-medium text-gray-700 dark:text-gray-300 select-none">Feature this post on home page segments</label>
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-800 dark:text-gray-100" for="excerpt">Excerpt (Short Description)</label>
                        <input id="excerpt" name="excerpt" class="form-input w-full px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-transparent dark:text-white focus:border-violet-500 focus:outline-none" type="text" value="{{ old('excerpt') }}" placeholder="Summarize your entry point briefly..." />
                        @error('excerpt') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-800 dark:text-gray-100" for="content">Content Body</label>
                        <textarea id="content" name="content" rows="10" class="form-textarea w-full px-3 py-2 border border-gray-200 dark:border-gray-700 rounded-lg bg-transparent dark:text-white focus:border-violet-500 focus:outline-none" required>{{ old('content') }}</textarea>
                        @error('content') <p class="text-xs text-rose-500 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end border-t border-gray-100 dark:border-gray-700/60 pt-5 mt-6 space-x-2">
                    <a href="{{ route('posts.index') }}" class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 font-medium text-sm rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-violet-500 hover:bg-violet-600 text-white font-medium text-sm rounded-lg shadow-sm">Save Post Entry</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
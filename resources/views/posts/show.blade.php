<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-4 bg-white shadow rounded-2xl">

        <!-- Title -->
        <h1 class="text-4xl font-bold mb-4">
            {{ $post->title }}
        </h1>

        <!-- Meta -->
        <x-post-meta :post="$post" />

        <!-- Content -->
        <div class="prose max-w-none text-gray-800">
            {{ $post->excerpt }}
        </div>

        <!-- Tags -->

        <div class="mt-8">
            <h3 class="text-sm font-semibold mb-2 text-gray-600">Tags:</h3>

            <x-post-tag :post="$post" />
        </div>

    </div>
</x-app-layout>

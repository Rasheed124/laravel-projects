{{-- <x-app-layout>
    @if ($posts->count())
        <div class="max-w-4xl mx-auto py-10 px-4">
            <h1 class="text-3xl font-bold mb-6">Latest Post by {{ $tag }}</h1>


            <!-- Post Card -->
            <x-post-items :posts="$posts" />

        </div>
    @endif

</x-app-layout> --}}

<x-app-layout>

    <div class="max-w-4xl mx-auto py-10 px-4">

        <h1 class="text-3xl font-bold mb-6">Posts tagged: {{ $tag }}</h1>

        @if ($posts->count())
            <x-post-items :posts="$posts" />
        @else
            <p class="text-gray-500">No posts found for this tag.</p>
        @endif

    </div>

</x-app-layout>

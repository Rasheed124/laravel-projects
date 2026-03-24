<x-app-layout>
    @if ($posts->count())
        <div class="max-w-4xl mx-auto py-10 px-4">
            <h1 class="text-3xl font-bold mb-6">Latest Post by {{ $authorName }}</h1>

           <x-post-items :posts="$posts" />
        </div>

    @endif

</x-app-layout>

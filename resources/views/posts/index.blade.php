{{-- @extends('app-layout')

@section('content') --}}
<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">All Posts</h1>

        @if ($postsRepo->count())
            <!-- Post Card -->
            @foreach ($postsRepo as $post)
                <x-post-item :post="$post" />
            @endforeach
        @endif
    </div>
</x-app-layout>

{{-- @endsection --}}

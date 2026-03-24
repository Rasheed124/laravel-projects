<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">All Posts</h1>

        @if ($postsRepo->count())
            <!-- Post Card -->
            @foreach ($postsRepo as $post)
                <div class="bg-white p-6 rounded-2xl shadow mb-6">
                    <h2 class="text-2xl font-semibold mb-2">{{ $post->slug }}</h2>

                    <p class="text-sm text-gray-500 mb-4">
                        By John Doe • March 24, 2026
                    </p>

                    <p class="text-gray-700 mb-4">
                        {{ $post->title }}
                    </p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">Tech</span>
                        <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs">Web</span>
                    </div>

                    <a href="/posts/{{ $post->slug }}" class="text-blue-600 font-medium hover:underline">
                        Read more →
                    </a>
                </div>
            @endforeach
        @endif



    </div>

</body>

</html>

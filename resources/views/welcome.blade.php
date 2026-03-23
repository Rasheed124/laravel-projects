<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <div>
        @if (session('new_link'))
            <div class="bg-white p-6 mt-20 rounded-2xl shadow-md w-full max-w-md mx-auto space-y-4">
                <a href="{{ url('/') }}/{{ session('new_link')->short_code }}" target="_blank">
                    {{ url('/') }}/{{ session('new_link')->short_code }}
                </a>
            </div>
        @endif

        <form method="POST" class="bg-white p-6 mt-20 rounded-2xl shadow-md w-full max-w-md mx-auto space-y-4"
            action="/shortner">

            @csrf

            <h2 class="text-2xl font-semibold text-gray-700 text-center">
                URL Shortener
            </h2>

            <div>
                <label class="block text-sm font-medium text-gray-600">Long URL</label>
                <input type="text" name="original_url" placeholder="https://example.com/very/long/link"
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" />
            </div>
            @error('original_url')
                <span class="text-red-500 text-center w-full ">{{ $message }}</span>
            @enderror

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
                Shorten URL
            </button>

            <div>
                <label class="block text-sm font-medium text-gray-600">Custom Code (Optional)</label>
                <input type="text" name="short_code" placeholder="my-link"
                    class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" />
            </div>

              @error('short_code')
                <span class="text-red-500 text-center w-full ">{{ $message }}</span>
            @enderror
        </form>
    </div>


</body>

</html>

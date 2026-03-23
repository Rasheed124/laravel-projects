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
    <form class="bg-white p-6 mt-20 rounded-2xl shadow-md w-full max-w-md mx-auto space-y-4" action="/shorten">

        @csrf

        <h2 class="text-2xl font-semibold text-gray-700 text-center">
            URL Shortener
        </h2>

        <div>
            <label class="block text-sm font-medium text-gray-600">Long URL</label>
            <input type="url" name="original_url" placeholder="https://example.com/very/long/link"
                class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                required />
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">
            Shorten URL
        </button>

        {{-- <div>
            <label class="block text-sm font-medium text-gray-600">Short URL</label>
            <input type="text" placeholder="https://short.ly/abc123"
                class="mt-1 w-full px-4 py-2 border rounded-lg bg-gray-100" readonly />
        </div> --}}
    </form>

</body>

</html>

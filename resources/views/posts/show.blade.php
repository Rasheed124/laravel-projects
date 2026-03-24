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

    <div class="max-w-3xl mx-auto py-10 px-4 bg-white shadow rounded-2xl">

        <!-- Title -->
        <h1 class="text-4xl font-bold mb-4">
            Post Title Goes Here
        </h1>

        <!-- Meta -->
        <p class="text-sm text-gray-500 mb-6">
            By John Doe • March 24, 2026
        </p>

        <!-- Content -->
        <div class="prose max-w-none text-gray-800">
            <p>
                This is the main content of the blog post. You can write paragraphs, headings, lists, and more here.
            </p>

            <h2>Subheading Example</h2>
            <p>
                Tailwind makes styling fast and flexible. You can easily build clean layouts without writing custom CSS.
            </p>

            <ul>
                <li>Simple to use</li>
                <li>Utility-first</li>
                <li>Highly customizable</li>
            </ul>
        </div>

        <!-- Tags -->
        <div class="mt-8">
            <h3 class="text-sm font-semibold mb-2 text-gray-600">Tags:</h3>
            <div class="flex flex-wrap gap-2">
                <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs">Tech</span>
                <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs">Design</span>
            </div>
        </div>

    </div>


</body>

</html>

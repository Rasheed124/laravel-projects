@props([
    'title' => '',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Welcome' }} | BlogNest</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-900">

    <nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex space-x-8 items-center">
                    <a href="{{ route('home') }}" class="font-bold text-xl text-violet-600 flex items-center gap-2">
                        <span>🪺 BlogNest</span>
                    </a>
                    <div class="hidden sm:flex space-x-6">
                        <a href="{{ route('home') }}"
                            class="text-sm font-medium {{ request()->routeIs('home') ? 'text-violet-600' : 'text-gray-500 hover:text-gray-900' }}">Home</a>
                        <a href="{{ route('frontend.blog') }}"
                            class="text-sm font-medium {{ request()->routeIs('frontend.blog') ? 'text-violet-600' : 'text-gray-500 hover:text-gray-900' }}">Blog</a>
                        <a href="{{ route('frontend.contact') }}"
                            class="text-sm font-medium {{ request()->routeIs('frontend.contact') ? 'text-violet-600' : 'text-gray-500 hover:text-gray-900' }}">Contact</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="text-sm font-medium text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-medium text-gray-600 hover:text-gray-900">Login</a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-violet-600 hover:bg-violet-700 rounded-lg transition-colors">Get
                            Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-white border-t border-gray-100 mt-20 py-8 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} BlogNest. Built on Laravel.
    </footer>
</body>

</html>

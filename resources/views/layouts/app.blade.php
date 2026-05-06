@props([
    'title' => '',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $title }} | BlogNest</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/vendors/flatpickr.min.css') }}" rel="stylesheet">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <script>
        if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').style.colorScheme = 'light';
        } else {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').style.colorScheme = 'dark';
        }
    </script>
</head>

<body class="font-inter antialiased bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400"
    :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">

    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <div class="flex h-[100dvh] overflow-hidden">
        @include('layouts.sidebar')

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            @include('layouts.header')

            <main class="grow">
                {{ $slot }}
            </main>
        </div>
    </div>

    <script src="{{ asset('js/vendors/alpinejs.min.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/vendors/chart.js') }}"></script>
    <script src="{{ asset('js/vendors/moment.js') }}"></script>
    <script src="{{ asset('js/vendors/chartjs-adapter-moment.js') }}"></script>
    <script src="{{ asset('js/dashboard-charts.js') }}"></script>
    <script src="{{ asset('js/vendors/flatpickr.js') }}"></script>
    <script src="{{ asset('js/flatpickr-init.js') }}"></script>
    @stack('scripts')

</body>

</html>

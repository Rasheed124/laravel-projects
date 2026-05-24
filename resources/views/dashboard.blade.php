<x-app-layout title="Dashboard">

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">



                <!-- Datepicker built with flatpickr -->
                <div class="relative">
                    <input
                        class="datepicker form-input pl-9 dark:bg-gray-800 text-gray-600 hover:text-gray-800 dark:text-gray-300 dark:hover:text-gray-100 font-medium w-[15.5rem]"
                        placeholder="Select dates" data-class="flatpickr-right" />
                    <div class="absolute inset-0 right-auto flex items-center pointer-events-none">
                        <svg class="fill-current text-gray-400 dark:text-gray-500 ml-3" width="16" height="16"
                            viewBox="0 0 16 16">
                            <path d="M5 4a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                            <path
                                d="M4 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4H4ZM2 4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4Z" />
                        </svg>
                    </div>
                </div>

                <!-- Add view button -->
                <button
                    class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Add View</span>
                </button>

            </div>

        </div>

        <!-- Cards -->
        {{-- <div class="grid grid-cols-12 gap-6">



            <!-- Line chart (Acme Plus) -->
            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Posts</h2>
                    </header>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">
                            {{ number_format(array_sum($data)) }}
                        </div>
                    </div>
                </div>
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
                    <canvas id="dashboard-card-01" width="389" height="128"></canvas>
                </div>
            </div>
            <!-- Line chart (Acme Advanced) -->
            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Acme Advanced</h2>

                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Sales</div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">$17,489</div>
                        <div class="text-sm font-medium text-red-700 px-1.5 bg-red-500/20 rounded-full">-14%</div>
                    </div>
                </div>
                <!-- Chart built with Chart.js 3 -->
                <!-- Check out src/js/dashboard-charts.js for config -->
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
                    <!-- Change the height attribute to adjust the chart height -->
                    <canvas id="dashboard-card-02" width="389" height="128"></canvas>
                </div>
            </div>

            <!-- Line chart (Acme Professional) -->
            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Acme Professional</h2>

                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Sales</div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">$9,962</div>
                        <div class="text-sm font-medium text-green-700 px-1.5 bg-green-500/20 rounded-full">+29%
                        </div>
                    </div>
                </div>
                <!-- Chart built with Chart.js 3 -->
                <!-- Check out src/js/dashboard-charts.js for config -->
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
                    <!-- Change the height attribute to adjust the chart height -->
                    <canvas id="dashboard-card-03" width="389" height="128"></canvas>
                </div>
            </div>


            <!-- Doughnut chart (Top Countries) -->
            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Top Countries</h2>
                </header>
                <!-- Chart built with Chart.js 3 -->
                <!-- Check out src/js/dashboard-charts.js for config -->
                <div class="grow flex flex-col justify-center">
                    <div>
                        <!-- Change the height attribute to adjust the chart height -->
                        <canvas id="dashboard-card-06" width="389" height="260"></canvas>
                    </div>
                    <div id="dashboard-card-06-legend" class="px-5 pt-2 pb-6">
                        <ul class="flex flex-wrap justify-center -m-1"></ul>
                    </div>
                </div>
            </div>

            <!-- Table (Top Channels) -->
            <!-- Table (Recent Posts & Engagement) -->
            <div class="col-span-full xl:col-span-8 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Recent Posts</h2>
                </header>
                <div class="p-3">
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full dark:text-gray-300">
                            <!-- Table header -->
                            <thead
                                class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Post Title</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Category</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Comments</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Date</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Status</div>
                                    </th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody class="text-sm font-medium divide-y divide-gray-100 dark:divide-gray-700/60">
                                @foreach ($recentPosts as $post)
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <!-- Post Icon/Avatar -->
                                                <div
                                                    class="shrink-0 mr-2 sm:mr-3 w-9 h-9 flex items-center justify-center bg-indigo-100 dark:bg-indigo-500/30 rounded-full">
                                                    <svg class="w-5 h-5 text-indigo-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 2v4h4"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-gray-800 dark:text-gray-100 truncate max-w-[200px]">
                                                    {{ $post->title }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-gray-500 dark:text-gray-400">
                                                {{ $post->category->name ?? 'Uncategorized' }}
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">{{ $post->comments_count }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-gray-500">
                                                {{ $post->created_at->format('M d, Y') }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">
                                                @if ($post->is_published)
                                                    <span
                                                        class="inline-flex font-medium bg-green-100 dark:bg-green-500/30 text-green-600 dark:text-green-400 rounded-full px-2.5 py-0.5">Published</span>
                                                @else
                                                    <span
                                                        class="inline-flex font-medium bg-yellow-100 dark:bg-yellow-500/30 text-yellow-600 dark:text-yellow-400 rounded-full px-2.5 py-0.5">Draft</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <!-- Card (Recent Activity) -->
            <div class="col-span-full xl:col-span-6 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Recent Activity</h2>
                </header>
                <div class="p-3">

                    <!-- Card content -->
                    <!-- "Today" group -->
                    <div>
                        <header
                            class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm font-semibold p-2">
                            Today</header>
                        <ul class="my-1">
                            <!-- Item -->
                            <li class="flex px-2">
                                <div class="w-9 h-9 rounded-full shrink-0 bg-violet-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                        <path
                                            d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                    </svg>
                                </div>
                                <div
                                    class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                    <div class="grow flex justify-between">
                                        <div class="self-center"><a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Nick Mark</a> mentioned <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Sara Smith</a> in a new post</div>
                                        <div class="shrink-0 self-end ml-2">
                                            <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                                                href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Item -->
                            <li class="flex px-2">
                                <div class="w-9 h-9 rounded-full shrink-0 bg-red-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                        <path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z" />
                                    </svg>
                                </div>
                                <div
                                    class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                    <div class="grow flex justify-between">
                                        <div class="self-center">The post <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Post Name</a> was removed by <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Nick Mark</a></div>
                                        <div class="shrink-0 self-end ml-2">
                                            <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                                                href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Item -->
                            <li class="flex px-2">
                                <div class="w-9 h-9 rounded-full shrink-0 bg-green-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                        <path
                                            d="M15 13v-3l-5 4 5 4v-3h8a1 1 0 000-2h-8zM21 21h-8a1 1 0 000 2h8v3l5-4-5-4v3z" />
                                    </svg>
                                </div>
                                <div class="grow flex items-center text-sm py-2">
                                    <div class="grow flex justify-between">
                                        <div class="self-center"><a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Patrick Sullivan</a> published a new <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">post</a></div>
                                        <div class="shrink-0 self-end ml-2">
                                            <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                                                href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- "Yesterday" group -->
                    <div>
                        <header
                            class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm font-semibold p-2">
                            Yesterday</header>
                        <ul class="my-1">
                            <!-- Item -->
                            <li class="flex px-2">
                                <div class="w-9 h-9 rounded-full shrink-0 bg-sky-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                        <path
                                            d="M23 11v2.085c-2.841.401-4.41 2.462-5.8 4.315-1.449 1.932-2.7 3.6-5.2 3.6h-1v2h1c3.5 0 5.253-2.338 6.8-4.4 1.449-1.932 2.7-3.6 5.2-3.6h3l-4-4zM15.406 16.455c.066-.087.125-.162.194-.254.314-.419.656-.872 1.033-1.33C15.475 13.802 14.038 13 12 13h-1v2h1c1.471 0 2.505.586 3.406 1.455zM24 21c-1.471 0-2.505-.586-3.406-1.455-.066.087-.125.162-.194.254-.316.422-.656.873-1.028 1.328.959.878 2.108 1.573 3.628 1.788V25l4-4h-3z" />
                                    </svg>
                                </div>
                                <div
                                    class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                    <div class="grow flex justify-between">
                                        <div class="self-center"><a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">240+</a> users have subscribed to <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Newsletter #1</a></div>
                                        <div class="shrink-0 self-end ml-2">
                                            <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                                                href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Item -->
                            <li class="flex px-2">
                                <div class="w-9 h-9 rounded-full shrink-0 bg-violet-500 my-2 mr-3">
                                    <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                        <path
                                            d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                    </svg>
                                </div>
                                <div class="grow flex items-center text-sm py-2">
                                    <div class="grow flex justify-between">
                                        <div class="self-center">The post <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Post Name</a> was suspended by <a
                                                class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white"
                                                href="#0">Nick Mark</a></div>
                                        <div class="shrink-0 self-end ml-2">
                                            <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400"
                                                href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>



        </div> --}}

        {{-- <div class="grid grid-cols-12 gap-6">

            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Articles</h2>
                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Published Content
                    </div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">
                            {{ number_format($stats['posts_count']) }}
                        </div>
                    </div>
                </div>
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
                    <canvas id="dashboard-card-01" width="389" height="128"></canvas>
                </div>
            </div>

            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Reader Comments</h2>
                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Community
                        Interaction</div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">
                            {{ number_format($stats['comments_count']) }}
                        </div>
                    </div>
                </div>
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
                    <canvas id="dashboard-card-02" width="389" height="128"></canvas>
                </div>
            </div>

            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Traffic & Content Value</h2>
                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Views vs.
                        Appreciations</div>
                    <div class="flex items-start space-x-6">
                        <div>
                            <span class="text-xs text-gray-400 block">Total Impressions</span>
                            <div class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                                {{ number_format($stats['total_views']) }}</div>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 block">Total Likes</span>
                            <div class="text-2xl font-bold text-green-600 dark:text-green-400">
                                +{{ number_format($stats['total_likes']) }}</div>
                        </div>
                    </div>
                </div>
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px] mt-4">
                    <canvas id="dashboard-card-03" width="389" height="128"></canvas>
                </div>
            </div>


            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Top Countries</h2>
                </header>
                <div class="grow flex flex-col justify-center">
                    <div>
                        <canvas id="dashboard-card-06" width="389" height="260"
                            data-labels="{{ json_encode($countryLabels) }}"
                            data-values="{{ json_encode($countryData) }}"></canvas>
                    </div>
                    <div id="dashboard-card-06-legend" class="px-5 pt-2 pb-6">
                        <ul class="flex flex-wrap justify-center -m-1"></ul>
                    </div>
                </div>
            </div>




            <div class="col-span-full xl:col-span-8 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Recent Posts</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full dark:text-gray-300">
                            <thead
                                class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Post Title</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Category</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Comments</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Date</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Status</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-medium divide-y divide-gray-100 dark:divide-gray-700/60">
                                @forelse ($recentPosts as $post)
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <div
                                                    class="shrink-0 mr-2 sm:mr-3 w-9 h-9 flex items-center justify-center bg-indigo-100 dark:bg-indigo-500/30 rounded-full">
                                                    <svg class="w-5 h-5 text-indigo-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 2v4h4"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-gray-800 dark:text-gray-100 truncate max-w-[200px]">
                                                    {{ $post->title }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-gray-500 dark:text-gray-400">
                                                {{ $post->category->name ?? 'Uncategorized' }}
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">{{ $post->comments_count }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-gray-500">
                                                {{ $post->created_at->format('M d, Y') }}
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">
                                                <span
                                                    class="inline-flex font-medium rounded-full px-2.5 py-0.5 {{ $post->is_published ? 'bg-green-100 dark:bg-green-500/30 text-green-600 dark:text-green-400' : 'bg-yellow-100 dark:bg-yellow-500/30 text-yellow-600 dark:text-yellow-400' }}">
                                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-4 text-center text-gray-400">No recent posts
                                            found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-span-full xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Live Interactions</h2>
                </header>
                <div class="p-3">
                    <div>
                        <header
                            class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm font-semibold p-2">
                            Latest Activity Feed
                        </header>
                        <ul class="my-1 divide-y divide-gray-100 dark:divide-gray-700/60">
                            @forelse($recentActivities as $activity)
                                <li class="flex px-2 py-2">
                                    <div
                                        class="w-9 h-9 rounded-full shrink-0 bg-violet-500 flex items-center justify-center text-white mr-3">
                                        <svg class="w-5 h-5 fill-current" viewBox="0 0 36 36">
                                            <path
                                                d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                        </svg>
                                    </div>
                                    <div class="grow flex items-center text-sm">
                                        <div class="grow flex justify-between items-center">
                                            <div class="text-gray-600 dark:text-gray-300">
                                                <span
                                                    class="font-semibold text-gray-800 dark:text-gray-100">{{ $activity->user->name ?? 'Guest Reader' }}</span>
                                                commented on
                                                <span
                                                    class="font-medium text-indigo-500">{{ Str::limit($activity->post->title ?? 'an article', 20) }}</span>
                                            </div>
                                            <div class="shrink-0 ml-2">
                                                <span
                                                    class="text-xs text-gray-400">{{ $activity->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="p-4 text-center text-xs text-gray-400">No user responses logged.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

        </div> --}}


        <div class="grid grid-cols-12 gap-6">

            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Total Articles</h2>
                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Published Content
                    </div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">
                            {{ number_format($stats['posts_count']) }}
                        </div>
                    </div>
                </div>
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
                    <canvas id="dashboard-card-01" width="389" height="128"
                        data-labels="{{ json_encode($labels) }}"
                        data-values="{{ json_encode($articlesData) }}"></canvas>
                </div>
            </div>

            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Reader Comments</h2>
                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Community
                        Interaction</div>
                    <div class="flex items-start">
                        <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">
                            {{ number_format($stats['comments_count']) }}
                        </div>
                    </div>
                </div>
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
                    <canvas id="dashboard-card-02" width="389" height="128"
                        data-labels="{{ json_encode($labels) }}"
                        data-values="{{ json_encode($commentsData) }}"></canvas>
                </div>
            </div>

            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <div class="px-5 pt-5">
                    <header class="flex justify-between items-start mb-2">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Traffic & Content Value</h2>
                    </header>
                    <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Views vs.
                        Appreciations</div>
                    <div class="flex items-start space-x-6">
                        <div>
                            <span class="text-xs text-gray-400 block">Total Impressions</span>
                            <div class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                                {{ number_format($stats['total_views']) }}
                            </div>
                        </div>
                        <div>
                            <span class="text-xs text-gray-400 block">Total Likes</span>
                            <div class="text-2xl font-bold text-green-600 dark:text-green-400">
                                +{{ number_format($stats['total_likes']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grow max-sm:max-h-[128px] xl:max-h-[128px] mt-4">
                    <canvas id="dashboard-card-03" width="389" height="128"
                        data-labels="{{ json_encode($labels) }}" data-values="{{ json_encode($viewsData) }}"></canvas>
                </div>
            </div>

            <div
                class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Top Countries</h2>
                </header>
                <div class="grow flex flex-col justify-center">
                    <div>
                        <canvas id="dashboard-card-06" width="389" height="260"
                            data-labels="{{ json_encode($countryLabels) }}"
                            data-values="{{ json_encode($countryData) }}"></canvas>
                    </div>
                    <div id="dashboard-card-06-legend" class="px-5 pt-2 pb-6">
                        <ul class="flex flex-wrap justify-center -m-1"></ul>
                    </div>
                </div>
            </div>

            <div class="col-span-full xl:col-span-8 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Recent Posts</h2>
                </header>
                <div class="p-3">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full dark:text-gray-300">
                            <thead
                                class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm">
                                <tr>
                                    <th class="p-2">
                                        <div class="font-semibold text-left">Post Title</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Category</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Comments</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Date</div>
                                    </th>
                                    <th class="p-2">
                                        <div class="font-semibold text-center">Status</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-medium divide-y divide-gray-100 dark:divide-gray-700/60">
                                @forelse ($recentPosts as $post)
                                    <tr>
                                        <td class="p-2">
                                            <div class="flex items-center">
                                                <div
                                                    class="shrink-0 mr-2 sm:mr-3 w-9 h-9 flex items-center justify-center bg-indigo-100 dark:bg-indigo-500/30 rounded-full">
                                                    <svg class="w-5 h-5 text-indigo-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M14 2v4h4"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-gray-800 dark:text-gray-100 truncate max-w-[200px]">
                                                    {{ $post->title }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-gray-500 dark:text-gray-400">
                                                {{ $post->category->name ?? 'Uncategorized' }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-sky-500">{{ $post->comments_count }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center text-gray-500">
                                                {{ $post->created_at->format('M d, Y') }}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center">
                                                <span
                                                    class="inline-flex font-medium rounded-full px-2.5 py-0.5 {{ $post->is_published ? 'bg-green-100 dark:bg-green-500/30 text-green-600 dark:text-green-400' : 'bg-yellow-100 dark:bg-yellow-500/30 text-yellow-600 dark:text-yellow-400' }}">
                                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="p-4 text-center text-gray-400">No recent posts
                                            found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-span-full xl:col-span-12 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
                <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
                    <h2 class="font-semibold text-gray-800 dark:text-gray-100">Recent Activity</h2>
                </header>
                <div class="p-3">

                    @php
                        // Group the collection dynamically by its day categorization
                        $groupedActivities = $recentActivities->groupBy(function ($activity) {
                            if ($activity->created_at->isToday()) {
                                return 'Today';
                            } elseif ($activity->created_at->isYesterday()) {
                                return 'Yesterday';
                            }
                            return $activity->created_at->format('F d, Y');
                        });
                    @endphp

                    @forelse($groupedActivities as $dayHeader => $activities)
                        <div class="{{ !$loop->first ? 'mt-4' : '' }}">
                            <header
                                class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700 dark:bg-opacity-50 rounded-sm font-semibold p-2">
                                {{ $dayHeader }}
                            </header>
                            <ul class="my-1">
                                @foreach ($activities as $activity)
                                    <li class="flex px-2">
                                        <div
                                            class="w-9 h-9 rounded-full shrink-0 bg-violet-500 my-2 mr-3 flex items-center justify-center text-white">
                                            <svg class="w-5 h-5 fill-current" viewBox="0 0 36 36">
                                                <path
                                                    d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                            </svg>
                                        </div>

                                        <div
                                            class="grow flex items-center {{ !$loop->last ? 'border-b border-gray-100 dark:border-gray-700/60' : '' }} text-sm py-2">
                                            <div class="grow flex justify-between items-center">
                                                <div class="self-center text-gray-600 dark:text-gray-300">
                                                    <span class="font-medium text-gray-800 dark:text-gray-100">
                                                        {{ $activity->user->name ?? 'Guest Reader' }}
                                                    </span>
                                                    commented on
                                                    <span class="font-medium text-gray-800 dark:text-gray-100">
                                                        {{ Str::limit($activity->post->title ?? 'an article', 28) }}
                                                    </span>
                                                    <span class="block text-xs text-gray-400 mt-0.5">
                                                        {{ $activity->created_at->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <div class="shrink-0 self-center ml-2">
                                                    @if (isset($activity->post))
                                                        <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400 inline-flex items-center"
                                                            href="#"
                                                            {{-- href="{{ route('posts.show', $activity->post->id) }}" --}}
                                                            target="_blank">
                                                            View<span class="hidden sm:inline">&nbsp;-&gt;</span>
                                                        </a>
                                                    @else
                                                        <span class="text-xs text-gray-400 italic">Unavailable</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @empty
                        <div class="p-6 text-center text-sm text-gray-400 dark:text-gray-500">
                            No user interaction records tracked for this dashboard session.
                        </div>
                    @endforelse

                </div>
            </div>


        </div>



    </div>
</x-app-layout>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Album Analytics</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <!-- Hero Section -->
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-16 mx-auto lg:gap-8 xl:gap-0 lg:grid-cols-12">
            <!-- Image Section -->
            <div class="hidden lg:mt-0 lg:col-span-6 lg:flex">
                <img src="/images/album.png" alt="Album Overview" class="h-full w-auto">
            </div>

            <!-- Text and Buttons Section -->
            <div class="mr-auto place-self-center lg:col-span-6">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white">
                    Explore Album Analytics
                </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Gain insights into your favorite albums, track performance, and discover trends with our comprehensive analytics platform.
                </p>
                <a href="{{ route('login') }}" class="inline-flex w-32 items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Log in
                </a>
                <a href="{{ route('register') }}" class="inline-flex w-32 items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Register
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-50 dark:bg-gray-800 py-16">
        <div class="max-w-screen-xl px-4 mx-auto text-center">
            <h2 class="mb-8 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-4xl dark:text-white">
                Key Features
            </h2>
            <div class="grid gap-8 lg:grid-cols-3">
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-900">
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Track Performance</h3>
                    <p class="text-gray-600 dark:text-gray-400">Monitor the popularity and streaming statistics of your favorite albums in real-time.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-900">
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Discover Trends</h3>
                    <p class="text-gray-600 dark:text-gray-400">Identify genre trends and find hidden gems in the music world with our analytics.</p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-900">
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Comprehensive Insights</h3>
                    <p class="text-gray-600 dark:text-gray-400">Get detailed breakdowns of album performance metrics to make informed decisions.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="bg-white dark:bg-gray-900 py-16">
        <div class="max-w-screen-xl px-4 mx-auto text-center">
            <h2 class="mb-8 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 md:text-4xl dark:text-white">
                What Our Users Say
            </h2>
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="p-6 bg-gray-100 rounded-lg shadow-md dark:bg-gray-800">
                    <blockquote class="text-gray-700 dark:text-gray-300">
                        "The analytics provided here helped me understand my favorite albums better than ever."
                    </blockquote>
                    <p class="mt-4 font-bold dark:text-white">- Alex Johnson, Music Enthusiast</p>
                </div>
                <div class="p-6 bg-gray-100 rounded-lg shadow-md dark:bg-gray-800">
                    <blockquote class="text-gray-700 dark:text-gray-300">
                        "A fantastic tool for tracking album performance and discovering trends in the industry."
                    </blockquote>
                    <p class="mt-4 font-bold dark:text-white">- Taylor Smith, Industry Professional</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8">
        <div class="max-w-screen-xl px-4 mx-auto text-center">
            <p class="text-sm">&copy; {{ date('Y') }} Album Analytics. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>

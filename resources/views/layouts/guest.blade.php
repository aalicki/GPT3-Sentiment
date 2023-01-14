<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-white antialiased bg-cyan-500">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <footer class="text-gray-600 body-font">
            <div class="bg-cyan-400 mt-20">
                <div class="lg:w-1/3 container px-5 py-6 mx-auto flex items-center sm:flex-row flex-col">
                    <a class="flex title-font font-medium items-center md:justify-start justify-center text-cyan-900">
                        <img src="{{asset('images/aspira-logo.png')}}" alt="Apsira Sentiment Logo" class="h-16">
                        <span class="ml-3"><strong>v.</strong> 0.1.9</span>
                    </a>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                © 2023 Aspira Sentiment —
                <a href="https://twitter.com/adamalicki" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@adamalicki</a>
            </span>
                </div>
            </div>
        </footer>
    </body>
</html>

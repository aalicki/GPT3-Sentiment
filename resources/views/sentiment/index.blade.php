<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') ?? 'App Name' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('css')
</head>
<body class="antialiased bg-cyan-500">

<section class="text-gray-600 body-font relative">
    @include('sentiment.form')
</section>

@if(!empty($sentiment))
    <section class="text-cyan-600 body-font relative">
        <div class="lg:w-1/3 bg-sky-700 rounded-lg p-8 flex flex-col mx-auto w-full mt-10 relative z-10 shadow-md">
            <span class="text-white">Overall Sentiment: <span class="font-bold">{{ strtoupper($sentiment) }}</span></span> <br>

            <p class="text-white">
                <span class="font-bold">Text Provided:</span><br>
                <i>{{$text}}</i>
            </p>
        </div>
    </section>
@endif

<section class="text-gray-600 body-font relative">
    <div class="lg:w-1/3 bg-gray-300 rounded-lg p-4 flex flex-col mx-auto w-full mt-10 relative z-10 shadow-md">
        <div x-data="{ expanded: false }">
            <button @click="expanded = ! expanded">Answers to your Questions &#8595</button>

            <div x-show="expanded" x-collapse>
                <p class="mt-5">
                    <strong>How many times can I check the sentiment of something?</strong><br>
                    <i>Guests</i> have 3 submissions per minute.<br>
                    <i>Logged In Users</i> have 10 submissions per minute.<br>
                    <i>Premium Users</i> have 100 submissions per minute.
                </p>

                <p class="mt-5">
                    <strong>Whats the cost of using this?</strong><br>
                    Currently we're offering this service for free. Though we have limits pending if you're a guest or logged in.
                    We'll eventually offer a premium service that has higher limits and more features.
                </p>
            </div>
        </div>
    </div>
</section>

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

@stack('scripts')

</body>
</html>

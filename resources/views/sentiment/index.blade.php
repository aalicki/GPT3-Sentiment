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

<body class="font-sans antialiased bg-cyan-500">
    <div class="min-h-screen">

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
                            Current limit is <strong>5 /per minute</strong>.<br><br>

                            You can change this in
                            <pre>
app/Providers/AppServiceProvider.php
                        </pre>

                        and set the limit
                        <pre>
public $limit = 5;
                        </pre>

                        to whatever number you want.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>
</html>


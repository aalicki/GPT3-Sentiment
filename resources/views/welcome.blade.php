<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('css')
    </head>
    <body class="antialiased bg-cyan-500">

    <section class="text-gray-600 body-font relative">
        <form method="post" action="{{ route('sentiment.check') }}">
            @csrf
            <div class="lg:w-1/3 bg-gray-700 rounded-lg p-8 flex flex-col mx-auto w-full mt-10 relative z-10 shadow-md">
                <h2 class="text-white text-2xl mb-1 font-medium title-font">Sentiment Detection</h2>
                <p class="leading-relaxed mb-5 text-white">Let's detect the amount of sentiment in a given text or string.</p>

                <div class="relative mb-4">
                    <label for="text" class="leading-7 text-blue-400">Text</label>
                    <textarea id="text" name="text" placeholder="Enter your text here"
                              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32
                              text-base text-gray-600 outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>

                <button class="text-white bg-emerald-600 border-0 py-2 px-6 focus:outline-none hover:bg-emerald-700 rounded text-lg">Process Sentiment</button>

                <p class="text-sm text-white mt-3">
                    We are calibrating our model to consistently better detect sentiment within a given text.<br> As of now, we return a very basic
                    rating, ranging from: Negative, Positive, and Neutral.
                </p>
            </div>
        </form>
    </section>

    @if(!empty($sentiment))
        <section class="text-gray-600 body-font relative">
            <div class="lg:w-1/3 bg-gray-700 rounded-lg p-8 flex flex-col mx-auto w-full mt-10 relative z-10 shadow-md">
                <span class="text-white">Overall Sentiment: <span class="font-bold">{{$sentiment}}</span></span> <br>

                <p class="text-white">
                    <span class="font-bold">Text Provided:</span><br>
                    <i>{{$text}}</i>
                </p>
            </div>
        </section>
    @endif

    @stack('scripts')

    </body>
</html>
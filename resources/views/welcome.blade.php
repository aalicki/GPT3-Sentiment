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
            <div class="lg:w-1/3 bg-gray-700 rounded-lg p-8 flex flex-col mx-auto w-full mt-10 relative z-10 shadow-md text-white">
                Welcome!
            </div>
        </section>

    @stack('scripts')

    </body>
</html>

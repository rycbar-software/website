<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <x-head.tinymce-config></x-head.tinymce-config>
        <x-head.prysmjs-config></x-head.prysmjs-config>
    </head>
    <body class="bg-gray-100 font-sans antialiased leading-normal tracking-normal">
        <div class="min-h-screen">
            @include('layouts.navigation')

            @if (isset($h1))
                <div class="container w-full md:max-w-5xl mx-auto pt-20">
                    <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $h1 }}</h1>
                </div>
            @endif

            <main class="container w-full md:max-w-5xl mx-auto pt-20">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

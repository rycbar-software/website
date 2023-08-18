<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @if(\Illuminate\Support\Facades\Auth::user()?->isAdmin())
            <x-head.tinymce-config></x-head.tinymce-config>
            <x-head.prysmjs-config></x-head.prysmjs-config>
        @endif
    </head>
    <body class="bg-gray-100 font-sans antialiased leading-normal tracking-normal">
        <div class="min-h-screen flex flex-col justify-between">
            <div>
                @include('layouts.navigation')

                @if (isset($h1))
                    <div class="container w-full md:max-w-5xl mx-auto pt-20">
                        <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $h1 }}</h1>
                    </div>
                @endif

                <main class="container w-full md:max-w-5xl mx-auto py-20">
                    {{ $slot }}
                </main>
            </div>
            <footer>
                test
            </footer>
        </div>
    </body>
</html>

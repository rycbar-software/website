<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @if(isset($seo))
            {{ $seo }}
        @else
            {!! seo() !!}
        @endif

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @if(\Illuminate\Support\Facades\Auth::user()?->isAdmin())
            <x-head.tinymce-config></x-head.tinymce-config>
            <x-head.prysmjs-config></x-head.prysmjs-config>
        @endif
    </head>
    <body class="bg-gray-100 font-sans antialiased leading-normal tracking-normal">
        @if (request()->route()->getName() == 'home')
            {{ $slot }}
        @else
            <div class="min-h-screen flex flex-col justify-between">
                <div>
                    @include('layouts.navigation')

                    @if (isset($h1))
                        <div class="container w-full md:max-w-5xl mx-auto pt-20">
                            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $h1 }}</h1>
                        </div>
                    @endif

                    @if(isset($breadcrumbs))
                        {{ $breadcrumbs }}
                    @else
                        {{ Breadcrumbs::render(request()->route()->getName()) }}
                    @endif

                    <main class="container w-full md:max-w-5xl mx-auto py-20">
                        {{ $slot }}
                    </main>
                </div>
                @include('components.footer')
            </div>
        @endif
    </body>
</html>

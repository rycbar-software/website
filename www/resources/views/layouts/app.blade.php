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
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @if(\Illuminate\Support\Facades\Auth::user()?->isAdmin())
            <x-head.tinymce-config></x-head.tinymce-config>
        @endif

        <x-head.prysmjs-config></x-head.prysmjs-config>

        <link rel="preload" href="{{ asset('/assets/fonts/raleway/style.css') }}" as="style">
    </head>
    <body class="bg-gray-100 font-sans antialiased leading-normal tracking-normal">
        @if (request()->route()->getName() == 'home')
            {{ $slot }}
        @else
            <div class="min-h-screen flex flex-col justify-between">
                <div>
                    @include('layouts.navigation')

                    @if (isset($h1))
                        <div class="container">
                            <h1 class="pt-20 font-bold font-sans break-normal text-gray-900 pb-2 text-3xl md:text-4xl">{{ $h1 }}</h1>
                        </div>
                    @endif

                    @if(isset($breadcrumbs))
                        {{ $breadcrumbs }}
                    @else
                        {{ Breadcrumbs::render(request()->route()->getName()) }}
                    @endif

                    @if($errors->any())
                        <div class="container">
                            <div class="py-20">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <main class="container">
                        <div class="py-20">
                            {{ $slot }}
                        </div>
                    </main>
                </div>
                @include('components.footer')
            </div>
        @endif
        <script src="{{ asset('/assets/fontobserver/fontobserver.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('/assets/fonts/raleway/style.css') }}">
    </body>
</html>

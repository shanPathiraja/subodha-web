<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @if (config('app.env') === 'production')
        <!-- Google Analytics -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162757472-2"></script>

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-162757472-2');
        </script>
    @endif

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Subodha Charles') }} | {{ $title ?? config('app.description') }}</title>

    <!-- Styles -->
    @include('layouts.partials._css')
</head>
<body class="text-gray-600 antialiased leading-normal font-sans {{ $bgcolor ?? 'bg-white' }} overflow-x-hidden">
    <!-- Main App -->
    <div id="app">
        @yield('main')
    </div>

    <!-- Scripts -->
    @include('layouts.partials._js')
</body>
</html>

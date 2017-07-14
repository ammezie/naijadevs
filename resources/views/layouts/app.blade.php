<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    
    <title>@yield('title') - Naijadevs</title>

    <meta name="description" content="@yield('meta-description')">

    <!-- Facebook Open Graph Tags -->
    <meta property="og:title" content="@yield('og-title')">
    <meta property="og:url" content="@yield('og-url')">
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:type" content="website">
    <meta property="og:image" content="link to image">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta property="og:site_name" content="Naijadevs">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@naijadevs_ng">
    <meta name="twitter:title" content="@yield('twitter-title')">
    <meta name="twitter:description" content="@yield('twitter-description')">
    <meta name="twitter:image" content="link to image">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">

    @stack('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @include('partials._navbar')
        
        <div id="main" class="pusher" style="margin-top: 50px; margin-bottom: 50px;">
            @yield('content')
        </div>

        <div class="ui hidden divider"></div>

        @include('partials._footer')
    </div>

    <!-- Scripts -->
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.ui.dropdown, .selection.dropdown, select.dropdown').dropdown();
    </script>
    @stack('scripts')
</body>
</html>

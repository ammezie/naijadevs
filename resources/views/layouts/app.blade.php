<!DOCTYPE html>
<html class="no-js" lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Naijadevs connects talented Nigerian developers and designers with companies who needs them.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <nav class="top-bar">
        <div class="top-bar-title">
            <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
                <button class="menu-icon dark" type="button" data-toggle></button>
            </span>
            <a href="{{ url('/') }}" class="">
                <img src="{{ asset('images/logo.png') }}" alt="Naijadevs Logo">
            </a>
        </div>
        <div id="responsive-menu">
            {{-- <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div> --}}
            <div class="top-bar-right">
                <ul class="menu">
                    @if (Auth::guest())
                    <li><a href="{{ url('login') }}">LOGIN</a></li>
                    <li><a href="{{ url('register') }}">SIGN UP</a></li>
                @else
                    <li><a href="#">Logout</a></li>
                @endif
                    <li>
                        <div class="">
                            <a href="#" class="button primary">Post a Job</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="app">
        @yield('content')        
    </div>

    <footer class="footer" style="background-color: #cacaca">
        <div class="row">
            <div class="small-12 medium-12 large-12 text-center">
                <small>
                    &copy;2017 Naijadevs. All rights reserved.
                </small>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).foundation();
    </script>
</body>
</html>

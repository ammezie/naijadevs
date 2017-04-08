<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left">
                {{-- <a class="uk-navbar-toggle" uk-navbar-toggle-icon href=""></a> --}}
                <a href="{{ url('/') }}" class="uk-navbar-item uk-logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Naijadevs Logo">
                </a>

                <ul class="uk-navbar-nav">
                    <li><a href="#" class="uk-active">About</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                @if (Auth::check())
                    <li><a href="{{ url('login') }}">Login</a></li>
                    <li><a href="{{ url('register') }}">Register</a></li>
                @else
                    <li class="uk-parent">
                        <a href="#">Name</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="#">Item</a></li>
                                <li class="uk-nav-divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </div>
                    </li>
                @endif
                    <li><a href="#" class="uk-active">Post a Job</a></li>
                </ul>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

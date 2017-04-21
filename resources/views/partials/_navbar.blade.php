<nav class="ui stackable borderless menu">
    <div class="ui container">
        <div class="item">
            <a href="{{ url('/') }}" class="">
                <img src="{{ asset('images/logo.png') }}" alt="Naijadevs Logo">
            </a>
        </div>
        <a class="item" href="{{ url('about') }}">
            About
        </a>
        <a class="item" href="{{ url('pricing') }}">
            Pricing
        </a>
    
        <div class="right item">
        @if (Auth::guest())
            <a class="item" href="{{ route('login') }}">
                Log In
            </a>
            <a class="item" href="{{ route('register') }}">
                Sign Up
            </a>
        @else
            <a class="item" href="{{ route('logout') }}">
                Logout
            </a>
        @endif
            <div class="item">
                <a class="ui primary button" href="{{ url('post_job') }}">Post a Job</a>
            </div>
        </div>
    </div>
</nav>
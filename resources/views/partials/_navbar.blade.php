<nav class="navbar ui stackable borderless menu">
    <div class="ui container">
        <div class="item">
            <a href="{{ url('/') }}" class="">
                <img src="{{ asset('images/logo.png') }}" alt="Naijadevs Logo">
            </a>
        </div>
        <a class="item" href="{{ url('/about') }}">
            About
        </a>
        <a class="item" href="{{ url('/pricing') }}">
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

            <div class="item">
                <a class="ui primary button" href="{{ route('post_job') }}">Post a Job</a>
            </div>
        @else
            <div class="item">
                <a class="ui primary button" href="{{ route('post_job') }}">Post a Job</a>
            </div>
        
            <div class="ui pointing dropdown item">
                My Account
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="{{ url('/my-jobs') }}">Jobs</a>
                    <a class="item" href="{{ url('/settings/account') }}">Settings</a>
                    <div class="divider"></div>
                    <a class="item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        @endif
        </div>
    </div>
</nav>
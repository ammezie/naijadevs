<nav class="computer-nav ui borderless menu">
    <div class="ui container">
        <div class="item">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Naijadevs Logo" width="145px" height="48px">
            </a>
        </div>
        <a class="item" href="{{ url('/about') }}">About</a>
        <a class="item" href="{{ url('/pricing') }}">Pricing</a>
    
        <div class="right menu">
        @if (Auth::guest())
            <a class="item" href="{{ route('login') }}">Log In</a>
            <a class="item" href="{{ route('register') }}">Sign Up</a>

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

{{-- Mobile nav --}}
<nav class="navbar mobile-nav">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ url('/') }}">
          <img src="{{ asset('images/logo.svg') }}" alt="Naijadevs Logo" width="145px" height="48px">
        </a>

        <div class="navbar-burger burger" data-target="navMenu">
          <span></span>
          <span></span>
          <span></span>
        </div>
    </div>

    <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ url('/about') }}">About</a>
            <a class="navbar-item" href="{{ url('/pricing') }}">Pricing</a>
        </div>

        <div class="navbar-end">
            @if (Auth::guest())
                <a class="navbar-item" href="{{ route('login') }}">Log In</a>
                <a class="navbar-item" href="{{ route('register') }}">Sign Up</a>
                <div class="navbar-item">
                    <a class="btn-primary" href="{{ route('post_job') }}">Post a Job</a>
                </div>
            @else
                <div class="navbar-item">
                    <a class="btn-primary" href="{{ route('post_job') }}">Post a Job</a>
                </div>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        My Account
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ url('/my-jobs') }}">Jobs</a>
                        <a class="navbar-item" href="{{ url('/settings/account') }}">Settings</a>
                        <hr class="navbar-divider">
                        <a class="navbar-item" href="{{ route('logout') }}"
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
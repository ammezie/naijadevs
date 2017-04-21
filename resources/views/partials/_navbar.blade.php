<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle="example-menu"></button>
    <div class="title-bar-title">Menu</div>
</div>
<nav class="navbar">
    <div class="row">
        <div class="large-12 columns">        
            <div class="top-bar-left">
                {{-- <a href="{{ url('/') }}" class="">
                    <img src="{{ asset('images/logo.png') }}" alt="Naijadevs Logo">
                </a> --}}
            </div>
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
    </div>
</nav>
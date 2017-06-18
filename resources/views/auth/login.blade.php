@extends('layouts.app')

@section('title', 'Log In')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Login to Naijadevs')
@section('og-url', route('login'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Login to Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable three column centered grid container">
        <div class="column">
            <h3 class="ui horizontal divider header">LOG IN</h3>

            @include('includes.flash.login_error')

            <form class="ui form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
              
                <div class="field">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
              
                <button type="submit" class="fluid ui primary button">LOG IN</button>

                <div class="ui hidden divider"></div>

                <div class="ui two column grid">
                    <div class="column">
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" id="remember" name="remember" tabindex="0" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Keep me logged in</label>
                            </div>
                        </div>
                    </div>
                    <div class="right aligned column">
                        <p>
                           <a href="{{ route('password.request') }}">Forgot password?</a> 
                        </p>
                    </div>
                </div>
            </form>

            <div class="ui divider"></div>

            <div class="ui column grid">
                <div class="center aligned column">
                    <p>
                        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

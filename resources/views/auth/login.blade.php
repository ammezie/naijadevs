@extends('layouts.app')

@section('content')
    <section class="login-page">
        <div class="row align-center">
            <div class="medium-4 columns">
                <h3 class="text-center">Welcome Back!</h3>

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    
                    <label>
                        Email
                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            required>
                    </label>

                    <label>
                        Password
                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            required>
                    </label>

                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember Me</label>

                    <button type="submit" class="button primary expanded">LOG IN</button>

                    <hr>

                    <div class="row">
                        <div class="medium-6 columns">
                            <p>
                               <a href="{{ url('#') }}">Forgot password?</a> 
                            </p>
                        </div>
                        <div class="medium-6 columns">
                            <p class="text-right">
                                <a href="{{ route('register') }}">Create new account</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

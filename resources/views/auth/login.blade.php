@extends('layouts.app')

@section('content')
    <div class="ui stackable three column centered grid container">
        <div class="column">
            <h3 class="ui horizontal divider header">LOG IN</h3>

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
                
                <div class="field">
                    <div class="ui checkbox">
                        <input type="checkbox" id="remember" tabindex="0" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Keep me logged in</label>
                    </div>
                </div>
              
                <button type="submit" class="fluid ui primary button">LOG IN</button>
            </form>

            <div class="ui divider"></div>

            <div class="ui two column grid">
                <div class="column">
                    <p>
                       <a href="{{ route('password.request') }}">Forgot password?</a> 
                    </p>
                </div>
                <div class="right aligned column">
                    <p>
                        <a href="{{ route('register') }}">Create new account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

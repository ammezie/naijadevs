@extends('layouts.app')

@section('content')
    <div class="uk-container">
        <div class="uk-flex uk-flex-center">
            <form method="POST" action="{{ route('login') }}" class="uk-form-stacked">
                {{ csrf_field() }}
                <h3 class="uk-heading-bullet">Login</h3>

                <div class="uk-margin">
                    <label for="email" class="uk-form-label">Email</label>
                    <div class="uk-form-controls">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                            <input type="email" name="email" class="uk-input" required>
                        </div>
                    </div>
                </div>

                <div class="uk-margin">
                    <label for="password" class="uk-form-label">Password</label>
                    <div class="uk-form-controls">
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: lock"></span>
                            <input type="password" name="password" class="uk-input" required>
                        </div>
                    </div>
                </div>

                <div class="uk-margin">
                    <label class="uk-form-label">
                        <input type="checkbox" name="remember" class="uk-checkbox" {{ old('remember') ? 'checked' : '' }}>
                        Remember Me
                    </label>
                </div>
                <div class="uk-margin">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Login</button>
                </div>

                <hr>

                <div class="uk-text-center">
                    <p>
                       <a class="uk-link-muted" href="{{ url('#') }}">Forgot password?</a> 
                    </p>
                    <p>
                        <a class="uk-link-muted" href="{{ url('register') }}">Create new account</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

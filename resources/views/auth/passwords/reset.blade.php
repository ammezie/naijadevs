@extends('layouts.app')

@section('content')
    <section class="login-page">
        <div class="row align-center">
            <div class="small-12 medium-4 large-4 columns">
                <h3 class="text-center">Reset Password</h3>

                @if (session('status'))
                    <div class="callout success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input
                        type="hidden"
                        name="token"
                        value="{{ $token }}">

                    <label>
                        Email <span class="required">*</span>
                        <input
                            type="email"
                            name="email"
                            class="{{ $errors->has('email') ? ' is-danger' : '' }}"
                            value="{{ $email or old('email') }}"
                            placeholder="Email"
                            aria-describedby="emailHelpText"
                            required>
                    </label>
                    @if ($errors->has('email'))
                        <p class="help-text is-danger" id="emailHelpText">
                            {{ $errors->first('email') }}
                        </p>
                    @endif

                    <label>
                        Password <span class="required">*</span>
                        <input
                            type="password"
                            name="password"
                            class="{{ $errors->has('password') ? ' is-danger' : '' }}"
                            placeholder="Password"
                            aria-describedby="passwordHelpText"
                            required>
                    </label>
                    @if ($errors->has('password'))
                        <p class="help-text is-danger" id="passwordHelpText">
                            {{ $errors->first('password') }}
                        </p>
                    @endif

                    <label>
                        Confirm Password <span class="required">*</span>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="{{ $errors->has('password_confirmation') ? ' is-danger' : '' }}"
                            placeholder="Password"
                            aria-describedby="confirmPasswordHelpText"
                            required>
                    </label>
                    @if ($errors->has('password_confirmation'))
                        <p class="help-text is-danger" id="confirmPasswordHelpText">
                            {{ $errors->first('password_confirmation') }}
                        </p>
                    @endif

                    <button type="submit" class="button expanded primary">Reset Password</button>
                </form>
            </div>
        </div>
    </section>
@endsection

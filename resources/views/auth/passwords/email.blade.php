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

                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <label>
                        Email <span class="required">*</span>
                        <input
                            type="email"
                            name="email"
                            class="{{ $errors->has('email') ? ' is-danger' : '' }}"
                            value="{{ old('email') }}"
                            placeholder="Email"
                            aria-describedby="emailHelpText"
                            required>
                    </label>
                    @if ($errors->has('email'))
                        <p class="help-text is-danger" id="emailHelpText">
                            {{ $errors->first('email') }}
                        </p>
                    @endif

                    <button type="submit" class="button expanded primary">Send Password Reset Link</button>
                </form>
            </div>
        </div>
    </section>
@endsection

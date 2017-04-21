@extends('layouts.app')

@section('content')
    <div class="ui stackable three column centered grid container">
        <div class="column">
            <h3 class="ui horizontal divider header">Reset Password</h3>

            @include('partials._form_errors')

            @if (session('status'))
                <div class="ui success message">
                    {{ session('status') }}
                </div>
            @endif

            <form class="ui form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}

                <input
                    type="hidden"
                    name="token"
                    value="{{ $token }}">

                <div class="required field{{ $errors->has('email') ? ' error' : '' }}">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ $email or old('email') }}"
                        placeholder="Email"
                        required>
                </div>

                <div class="required field{{ $errors->has('password') ? ' error' : '' }}">
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        required>
                </div>

                <div class="required field{{ $errors->has('password_confirmation') ? ' error' : '' }}">
                    <label>Confirm Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Password"
                        required>
                </div>

                <button type="submit" class="fluid ui primary button">Reset Password</button>
            </form>
        </div>
    </div>
@endsection

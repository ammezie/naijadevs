@extends('layouts.app')

@section('title', 'Reset Password')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Reset password on Naijadevs')
@section('og-url', route('password.reset', $token))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Reset password on Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable three column centered grid container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="column">
            <h3 class="ui horizontal divider header">Reset Password</h3>

            @include('includes.form_errors')

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

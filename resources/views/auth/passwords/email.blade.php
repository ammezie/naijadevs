@extends('layouts.app')

@section('title', 'Reset Password')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Reset password on Naijadevs')
@section('og-url', route('password.request'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Reset password on Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable three column centered grid container">
        <div class="column">
            <h3 class="ui horizontal divider header">Reset Password</h3>

            @include('includes.form_errors')
                
            @if (session('status'))
                <div class="ui success message">
                    {{ session('status') }}
                </div>
            @endif

            <form class="ui form" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="required field{{ $errors->has('email') ? ' error' : '' }}">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email"
                        required>
                </div>

                <button type="submit" class="fluid ui primary button">Send Password Reset Link</button>
            </form>
        </div>
    </div>
@endsection

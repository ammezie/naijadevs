@extends('layouts.app')

@section('title', 'Profile Settings')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Profile Settings')
@section('og-url', url('/settings/account'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Profile Settings')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable mobile reversed grid container">
        <div class="four wide column">
            @include('users.partials._user_nav')
        </div>

        <div class="twelve wide column">
            <h2 class="ui dividing header">Update Profile</h2>

            @include('includes.form_errors')
            @include('includes.flash.success')

            <form class="ui form" method="POST" action="{{ route('update_account') }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="field{{ $errors->has('name') ? ' error' : '' }}">
                    <label>Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        placeholder="Name"
                        required>
                </div>

                <div class="field{{ $errors->has('email') ? ' error' : '' }}">
                    <label>Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        placeholder="Email"
                        required>
                </div>

                <div class="ui warning visible message">
                    Fill only if you want to change your password
                </div>

                <div class="field{{ $errors->has('password') ? ' error' : '' }}">
                    <label>Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="New Password">
                </div>

                <div class="field{{ $errors->has('password') ? ' error' : '' }}">
                    <label>Confirm Password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Confirm New Password">
                </div>
                
                <button type="submit" class="ui primary button">Update Profile</button>
            </form>
        </div>
    </div>
@endsection
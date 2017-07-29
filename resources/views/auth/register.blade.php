@extends('layouts.app')

@section('title', 'Create New Account')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Create a new account on Naijadevs')
@section('og-url', route('register'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Create a new account on Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable two column centered grid container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="column">
            <h3 class="ui horizontal divider header">Create New Account</h3>
            
            @include('includes.form_errors')

            <form class="ui form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <h4 class="ui dividing header">Personal Information</h4>

                <div class="two fields">
                    <div class="required field{{ $errors->has('name') ? ' error' : '' }}">
                        <label>Name</label>
                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Name"
                            required>
                    </div>

                    <div class="required field{{ $errors->has('email') ? ' error' : '' }}">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Email"
                            required>
                    </div>
                </div>
                
                <div class="two fields">
                    <div class="required field{{ $errors->has('password') ? ' error' : '' }}">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            required>
                    </div>

                    <div class="required field">
                        <label>Confirm Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="Confirm Password"
                            required>
                    </div>
                </div>

                <h4 class="ui dividing header">Company Information</h4>

                <div class="two fields">
                    <div class="required field{{ $errors->has('company_name') ? ' error' : '' }}">
                        <label>Company Name</label>
                        <input
                            type="text"
                            name="company_name"
                            value="{{ old('company_name') }}"
                            placeholder="Company Name"
                            required>
                    </div>

                    <div class="required field{{ $errors->has('company_website') ? ' error' : '' }}">
                        <label>Company Website</label>
                        <input
                            type="text"
                            name="company_website"
                            value="{{ old('company_website') }}"
                            placeholder="http://company.com"
                            required>
                    </div>
                </div>
                
                <button type="submit" class="fluid ui primary button">SIGN UP</button>
            </form>

            <div class="ui divider"></div>

            <div class="ui center aligned grid">
                <div class="column">
                    <p>
                        Already got an account? <a href="{{ route('login') }}">Log In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

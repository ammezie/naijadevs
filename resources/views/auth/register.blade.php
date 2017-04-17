@extends('layouts.app')

@section('content')
    <section class="signup-page">
        <div class="row align-center">
            <div class="small-12 medium-7 large-7 columns">
                <h3 class="text-center">Create New Account</h3>

                <form method="POST" action="{{ route('register') }}" class="uk-form-stacked">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="small-12 medium-12 large-12 columns">
                            <p class="lead heading-divider">Personal Details</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="small-12 medium-6 large-6 columns">
                            <label>
                                Name <span class="required">*</span>
                                <input
                                    type="text"
                                    name="name"
                                    class="{{ $errors->has('name') ? ' is-danger' : '' }}"
                                    value="{{ old('name') }}"
                                    placeholder="Name"
                                    aria-describedby="nameHelpText"
                                    required>
                            </label>
                            @if ($errors->has('name'))
                                <p class="help-text is-danger" id="nameHelpText">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>
                        <div class="small-12 medium-6 large-6 columns">
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
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-6 large-6 columns">
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
                        </div>
                        <div class="small-12 medium-6 large-6 columns">
                            <label>
                                Confirm Password <span class="required">*</span>
                                <input
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="Confirm Password"
                                    required>
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-12 large-12 columns">
                            <p class="lead heading-divider">Company Details</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="small-12 medium-6 large-6 columns">
                            <label>
                                Company Name <span class="required">*</span>
                                <input
                                    type="text"
                                    name="company_name"
                                    class="{{ $errors->has('company_name') ? ' is-danger' : '' }}"
                                    value="{{ old('company_name') }}"
                                    placeholder="Company Name"
                                    aria-describedby="companyNameHelpText"
                                    required>
                            </label>
                            @if ($errors->has('company_name'))
                                <p class="help-text is-danger" id="companyNameHelpText">
                                    {{ $errors->first('company_name') }}
                                </p>
                            @endif
                        </div>
                        <div class="small-12 medium-6 large-6 columns">
                            <label>
                                Company Website <span class="required">*</span>
                                <input
                                    type="text"
                                    name="company_website"
                                    class="{{ $errors->has('company_website') ? ' is-danger' : '' }}"
                                    value="{{ old('company_website') }}"
                                    placeholder="http://company.com"
                                    aria-describedby="companyWebsiteHelpText"
                                    required>
                            </label>
                            @if ($errors->has('company_website'))
                                <p class="help-text is-danger" id="companyWebsiteHelpText">
                                    {{ $errors->first('company_website') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    
                    <button type="submit" class="button expanded primary">SIGN UP</button>

                    <hr>

                    <div class="row">
                        <div class="medium-12 columns">
                            <p class="text-center">
                                Already got an account? <a href="{{ route('login') }}">Log In</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

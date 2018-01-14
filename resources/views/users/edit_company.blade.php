@extends('layouts.app')

@section('title', 'Company Settings')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Company Settings')
@section('og-url', url('/settings/company'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Company Settings')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable mobile reversed grid container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="four wide column">
            @include('users.partials._user_nav')
        </div>

        <div class="twelve wide column">
            <div class="ui basic segment bgWhite roundBordered">
                <h2 class="ui dividing header">Update Company</h2>

                @include('includes.form_errors')
                @include('includes.flash.success')

                <form class="ui form" method="POST" action="{{ route('update_company') }}" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="ui stackable two column grid">
                        <div class="column">
                            <div class="required field{{ $errors->has('company_name') ? ' error' : '' }}">
                                <label>Company Name</label>
                                <input
                                    type="text"
                                    name="company_name"
                                    value="{{ old('company_name', auth()->user()->company_name) }}"
                                    placeholder="Company Name"
                                    required>
                            </div>

                            <div class="required field{{ $errors->has('company_website') ? ' error' : '' }}">
                                <label>Company Website</label>
                                <input
                                    type="text"
                                    name="company_website"
                                    value="{{ old('company_website', auth()->user()->company_website) }}"
                                    placeholder="http://company.com"
                                    required>
                            </div>

                            <div class="field{{ $errors->has('company_location') ? ' error' : '' }}">
                                <label>Company Location</label>
                                <select
                                    name="company_location"
                                    class="ui search dropdown">
                                    <option value="">Select Company Location</option>
                                    @foreach ($locations as $location)
                                        <option
                                            value="{{ $location->id }}"
                                            @if (old('company_location'))
                                                {{ (old('company_location') == $location->id) ? 'selected' : '' }}
                                            @else
                                                {{ (auth()->user()->company_location == $location->id) ? 'selected' : '' }}
                                            @endif
                                            >{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="required field{{ $errors->has('company_about') ? ' error' : '' }}">
                                <label>Brief About Company</label>
                                <textarea
                                    name="company_about"
                                    id="company_about"
                                    rows="5"
                                    placeholder="Very brief about company">{{ old('company_about', auth()->user()->company_about) }}</textarea>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field{{ $errors->has('company_name') ? ' error' : '' }}">
                                <label>Company Logo</label>
                                @if (auth()->user()->company_logo)
                                    <img class="ui small image" src="{{ asset('storage/' . auth()->user()->company_logo) }}" alt="company logo">
                                @endif
                                <input
                                    type="file"
                                    name="company_logo"
                                    placeholder="Company Logo">
                            </div>
                        </div>
                    </div>

                    <div class="ui one column grid">
                        <div class="column">
                            <button type="submit" class="ui primary button">Update Company</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="page-content">
        {{ Breadcrumbs::render('users.edit', $user) }}

        <h1 class="page-title"> Edit User</h1>

        <div class="portlet light bordered">
            <div class="portlet-body">

                <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" placeholder="name" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" placeholder="Email address" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="company_name" value="{{ old('company_name', $user->company_name) }}" placeholder="Company name" required>
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        {{ $errors->first('company_name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('company_website') ? ' has-error' : '' }}">
                                <label>Company Website</label>
                                <input type="text" class="form-control" name="company_website" value="{{ old('company_website', $user->company_website) }}" placeholder="Company company website" required>
                                @if ($errors->has('company_website'))
                                    <span class="help-block">
                                        {{ $errors->first('company_website') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('company_location') ? ' has-error' : '' }}">
                                <label>Company Location</label>
                                <select
                                    name="company_location"
                                    class="form-control">
                                    <option value="">Select Company Location</option>
                                    @foreach ($locations as $location)
                                        <option
                                            value="{{ $location->id }}"
                                            @if (old('company_location'))
                                                {{ (old('company_location') == $location->id) ? 'selected' : '' }}
                                            @else
                                                {{ ($user->company_location == $location->id) ? 'selected' : '' }}
                                            @endif
                                            >{{ $location->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company_location'))
                                    <span class="help-block">
                                        {{ $errors->first('company_location') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('company_location') ? ' has-error' : '' }}">
                                <label>Brief About Company</label>
                                <textarea class="form-control" name="company_about" rows="5" placeholder="Brief About Company" required>{{ old('company_about', $user->company_about) }}</textarea>
                                @if ($errors->has('company_about'))
                                    <span class="help-block">
                                        {{ $errors->first('company_about') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('company_website') ? ' has-error' : '' }}">
                                <label>Company Logo</label>
                                <div class="form-group{{ $errors->has('company_logo') ? ' has-error' : '' }}">
                                    @if ($user->company_logo)
                                        <img src="{{ asset('storage/' . $user->company_logo) }}" alt="company logo" width="150" height="100">
                                    @endif

                                    <input
                                        type="file"
                                        name="company_logo"
                                        accept="image/*"
                                        placeholder="Company Logo">
                                </div>
                                @if ($errors->has('company_logo'))
                                    <span class="help-block">
                                        {{ $errors->first('company_logo') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
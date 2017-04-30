@extends('layouts.app')

@section('title', 'Create A Job')

@section('content')
    <div class="ui stackable two column centered grid container">
        <div class="column">
            <h3 class="ui dividing header">
                Create a Job
                <div class="sub header">Be descriptive as possible with your job.</div>
            </h3>

            @include('includes.form_errors')

            <form class="ui form" method="POST" action="{{ url('/jobs') }}">
                {{ csrf_field() }}

                <div class="required field{{ $errors->has('title') ? ' error' : '' }}">
                    <label>Title</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Job Title"
                        required>
                </div>

                <div class="required field{{ $errors->has('description') ? ' error' : '' }}">
                    <label>Description</label>
                    <textarea
                        name="description"
                        rows="10"
                        placeholder="Job Description"
                        required>{{ old('description') }}</textarea>
                </div>

                <div class="required field{{ $errors->has('apply') ? ' error' : '' }}">
                    <label>How To Apply</label>
                    <select
                        name="apply"
                        class="ui dropdown"
                        v-model="apply"
                        required>
                        <option value="url">External URL</option>
                        <option value="email">Email</option>
                    </select>
                </div>

                <div class="required field" v-if="apply === 'url'">
                    <label>Link</label>
                    <input
                        type="url"
                        name="apply_url"
                        value="{{ old('apply_url') }}"
                        placeholder="http://"
                        required>
                </div>

                <div class="two fields" v-else>
                    <div class="required field">
                        <label>Email Address</label>
                        <input
                            type="email"
                            name="apply_email"
                            value="{{ old('apply_email') }}"
                            placeholder="Email Address"
                            required>
                    </div>
                    <div class="field">
                        <label>Email Subject</label>
                        <input
                            type="text"
                            name="apply_email_subject"
                            value="{{ old('apply_email_subject') }}"
                            placeholder="Email Subject">
                    </div>
                </div>

                <div class="two fields">
                    <div class="required field{{ $errors->has('type') ? ' error' : '' }}">
                        <label>Type</label>
                        <select
                            name="type_id"
                            class="ui dropdown"
                            required>
                            <option value="">Select Job Type</option>
                            @foreach ($jobTypes as $type)
                                <option
                                    value="{{ $type->id }}"
                                    @if (old('type'))
                                        {{ (old('type') == $type->id) ? 'selected' : ''}}
                                    @else
                                        {{ $loop->first ? 'selected' : '' }}
                                    @endif
                                    >{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="required field{{ $errors->has('location') ? ' error' : '' }}" :class="{ disabled: is_remote }">
                        <label>Location</label>
                        <select
                            name="location_id"
                            class="ui search dropdown"
                            required>
                            <option value="">Select Job Location</option>
                            @foreach ($locations as $location)
                                <option
                                    value="{{ $location->id }}"
                                    @if (old('location'))
                                        {{ (old('location') == $location->id) ? 'selected' : ''}}
                                    @else
                                        {{ $loop->iteration === 25 ? 'selected' : '' }}
                                    @endif
                                    >{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="two fields">
                    <div class="field">
                        <div class="ui checkbox">
                            <input
                                type="checkbox"
                                id="remote"
                                name="is_remote"
                                value="1"
                                {{ old('is_remote') ? 'checked' : '' }}
                                tabindex="0"
                                v-model="is_remote">
                            <label for="remote">This is a remote job</label>
                        </div>
                    </div>

                    <div class="required field{{ $errors->has('category') ? ' error' : '' }}">
                        <label>Category</label>
                        <select
                            name="category_id"
                            class="ui search dropdown"
                            required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @if (old('category'))
                                        {{ (old('category') == $category->id) ? 'selected' : ''}}
                                    @else
                                        {{ $loop->first ? 'selected' : '' }}
                                    @endif
                                    >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="field{{ $errors->has('salary') ? ' error' : '' }}">
                    <label>Salary</label>
                    <div class="ui labeled input">
                        <div class="ui label">₦</div>
                        <input
                            type="text"
                            name="salary"
                            value="{{ old('salary') }}"
                            placeholder="80,000 ~ 120,000 or fixed amount"
                            v-model="salary">
                    </div>
                </div>
              
                <button type="submit" class="ui primary button">Post Job</button>                
            </form>
        </div>
    </div>
@endsection

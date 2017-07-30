@extends('layouts.app')

@section('title', 'Post New Job')
@section('meta-description', 'Post new job on Naijadevs.')
@section('og-title', 'Post New Job')
@section('og-url', route('post_job'))
@section('og-description', 'Post new job on Naijadevs.')
@section('twitter-title', 'Post New Job')
@section('twitter-description', 'Post new job on Naijadevs.')

@push('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@section('content')
    <div class="ui stackable grid container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="twelve wide column">
            <h3 class="ui dividing header">
                Post a Job
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
                        id="description"
                        rows="10"
                        placeholder="Job Description"
                        required>{{ old('description') }}</textarea>
                </div>

                <div class="required field{{ $errors->has('apply') ? ' error' : '' }}">
                    <label>How To Apply</label>
                    <select
                        name="apply"
                        id="apply"
                        class="ui dropdown"
                        required>
                        <option value="url">External URL</option>
                        <option value="email">Email</option>
                    </select>
                </div>

                <div class="required field" id="apply_url">
                    <label>Link</label>
                    <input
                        type="url"
                        name="apply_url"
                        value="{{ old('apply_url') }}"
                        placeholder="http://">
                </div>

                <div class="two fields" id="apply_email" style="display: none">
                    <div class="required field">
                        <label>Email Address</label>
                        <input
                            type="email"
                            name="apply_email"
                            value="{{ old('apply_email') }}"
                            placeholder="Email Address">
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
                    <div class="required field{{ $errors->has('type_id') ? ' error' : '' }}">
                        <label>Type</label>
                        <select
                            name="type_id"
                            class="ui dropdown"
                            required>
                            <option value="">Select Job Type</option>
                            @foreach ($jobTypes as $type)
                                <option
                                    value="{{ $type->id }}"
                                    @if (old('type_id'))
                                        {{ (old('type_id') == $type->id) ? 'selected' : ''}}
                                    @else
                                        {{ $loop->first ? 'selected' : '' }}
                                    @endif
                                    >{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="required field{{ $errors->has('location_id') ? ' error' : '' }}" id="location">
                        <label>Location</label>
                        <select
                            name="location_id"
                            class="ui search dropdown">
                            <option value="">Select Job Location</option>
                            @foreach ($locations as $location)
                                <option
                                    value="{{ $location->id }}"
                                    @if (old('location_id'))
                                        {{ (old('location_id') == $location->id) ? 'selected' : ''}}
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
                                id="is_remote"
                                name="is_remote"
                                value="1"
                                {{ old('is_remote') ? 'checked' : '' }}
                                tabindex="0">
                            <label for="is_remote">This is a remote job</label>
                        </div>
                    </div>

                    <div class="required field{{ $errors->has('category_id') ? ' error' : '' }}">
                        <label>Category</label>
                        <select
                            name="category_id"
                            class="ui search dropdown"
                            required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @if (old('category_id'))
                                        {{ (old('category_id') == $category->id) ? 'selected' : ''}}
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
                            placeholder="80,000 ~ 120,000 or fixed amount">
                    </div>
                </div>
              
                <button type="submit" class="ui primary button">Post Job</button>                
            </form>
        </div>

        <div class="four wide column">
            <div class="ui segments">
                <div class="ui segment">
                    <h4 class="ui header">How does it works?</h4>
                    <p>
                        Posting a job is <strong>TOTALLY FREE</strong> (while in Beta), your job posting will be open for 60 days after which it will automatically expire (that's if you don't close it first).
                    </p>
                    <p>
                        <em>You are limited to one job per posting.</em>
                    </p>
                </div>

                <div class="ui segment">
                    <h4 class="ui header">Why post on Naijadevs?</h4>
                    <p>
                        The best way to reach the fast growing community of talented Nigerian developers and designers.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script>
        $('#apply').change(function() {
            if ($(this).val() == 'url') {
                $('#apply_url').show();
                $('#apply_email').hide();
            } else {
                $('#apply_email').show();
                $('#apply_url').hide();
            }
        });

        $('#is_remote').click(function() {
            if ($('#is_remote').prop('checked')) {
                $('#location').addClass('disabled');
            } else {
                $('#location').removeClass('disabled');
            }
        });

        var simplemde = new SimpleMDE({
            element: document.getElementById('description'),
            forceSync: true,
            status: false,
        });
    </script>
@endpush

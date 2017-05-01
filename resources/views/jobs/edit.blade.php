@extends('layouts.app')

@section('title', 'Edit Job')

@section('content')
    <div class="ui stackable two column centered grid container">
        <div class="column">
            <h3 class="ui dividing header">
                Edit Job
                <div class="sub header">Be descriptive as possible with your job.</div>
            </h3>

            @include('includes.form_errors')

            <form class="ui form" method="POST" action="{{ url('/jobs/' . $job->id) }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                <div class="required field{{ $errors->has('title') ? ' error' : '' }}">
                    <label>Title</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') ? old('title') : $job->title }}"
                        placeholder="Job Title"
                        required>
                </div>

                <div class="required field{{ $errors->has('description') ? ' error' : '' }}">
                    <label>Description</label>
                    <textarea
                        name="description"
                        rows="10"
                        placeholder="Job Description"
                        required>{{ old('description') ? old('description') : $job->description }}</textarea>
                </div>

                <div class="required field{{ $errors->has('apply') ? ' error' : '' }}">
                    <label>How To Apply</label>
                    <select
                        name="apply"
                        id="apply"
                        class="ui dropdown"
                        required>
                        <option value="url" {{ ($job->apply == 'url') ? 'selected' : '' }}>External URL</option>
                        <option value="email" {{ ($job->apply == 'email') ? 'selected' : '' }}>Email</option>
                    </select>
                </div>

                <div class="required field" id="apply_url" style="{{ ($job->apply != 'url') ? 'display: none' : '' }}">
                    <label>Link</label>
                    <input
                        type="url"
                        name="apply_url"
                        value="{{ old('apply_url') ? old('apply_url') : $job->apply_url }}"
                        placeholder="http://">
                </div>

                <div class="two fields" id="apply_email" style="{{ ($job->apply != 'email') ? 'display: none' : '' }}">
                    <div class="required field">
                        <label>Email Address</label>
                        <input
                            type="email"
                            name="apply_email"
                            value="{{ old('apply_email') ? old('apply_email') : $job->apply_email }}"
                            placeholder="Email Address">
                    </div>
                    <div class="field">
                        <label>Email Subject</label>
                        <input
                            type="text"
                            name="apply_email_subject"
                            value="{{ old('apply_email_subject') ? old('apply_email_subject') : $job->apply_email_subject }}"
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
                                        {{ ($job->type_id == $type->id) ? 'selected' : '' }}
                                    @endif
                                    >{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="required field{{ $errors->has('location_id') ? ' error' : '' }} {{ $job->is_remote ? 'disabled' : '' }}" id="location">
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
                                        {{ ($job->location_id == $location->id) ? 'selected' : '' }}
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
                                @if (old('is_remote'))
                                    {{ old('is_remote') ? 'checked' : '' }}
                                @else
                                    {{ $job->is_remote ? 'checked' : '' }}
                                @endif
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
                                        {{ ($job->category_id == $category->id) ? 'selected' : '' }}
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
                            value="{{ old('salary') ? old('salary') : $job->salary }}"
                            placeholder="80,000 ~ 120,000 or fixed amount">
                    </div>
                </div>
              
                <button type="submit" class="ui primary button">Update Job</button>                
            </form>
        </div>
    </div>
@endsection

@push('scripts')
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
    </script>
@endpush

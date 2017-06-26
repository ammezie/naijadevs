@extends('layouts.app')

@section('title', 'Connects talented Nigerian developers and designers with companies who needs them')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Naijadevs')
@section('og-url', url('/'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui grid container">
        <div class="sixteen wide mobile sixteen wide tablet twelve wide computer column">
            
            @include('partials._filters')

            <div class="ui divider"></div>

            @if ($jobs->isEmpty())
                <p>No jobs found for your filters.</p>
            @else
                <div class="ui divided relaxed items">
                    @foreach ($jobs as $job)
                        <div class="item">
                            <div class="ui tiny image">
                                <img src="{{ $job->creator->company_logo ? asset($job->creator->company_logo) : '' }}">
                            </div>
                            <div class="content">
                                <a class="header" href="{{ url($job->path()) }}">
                                    {{ $job->title }}
                                </a>
                                <div class="meta">
                                    <span class="company">
                                        {{ $job->creator->company_name }}
                                    </span>
                                    <span class="location">
                                        <i class="red {{ $job->is_remote ? 'world' : 'marker' }} icon"></i>
                                        {{ $job->is_remote ? 'Remote' : $job->location->name }}
                                    </span>
                                    <span class="ui right floated category">
                                        <div class="ui basic {{ $job->category->color }} label">
                                            {{ $job->category->name }}
                                        </div>
                                    </span>
                                    <span class="ui right floated type">
                                        <div class="ui basic {{ $job->type->color }} label">
                                            {{ $job->type->name }}
                                        </div>
                                    </span>
                                </div>
                                <div class="extra">
                                    <span class="date">
                                        Posted: {{ $job->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="ui center aligned one column grid">
                <div class="column">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>

        <div class="four wide column large screen only">
            <h3 class="ui top attached header">
                <i class="red fitted filter icon"></i>
                <div class="content">
                    Filters
                </div>
            </h3>

            <div class="ui attached padded segment">
                <h4 class="ui header">Type</h4>
                <div class="ui list">
                    @foreach ($jobTypes as $type)
                        <div class="item">
                            <div class="ui checkbox">
                                <input id="{{ str_slug($type->name) }}" type="checkbox" name="type">
                                <label for="{{ str_slug($type->name) }}">
                                    <a href="{{ url('') }}">{{ $type->name }}</a>
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h4 class="ui header">Category</h4>
                <div class="ui list">
                    @foreach ($categories as $category)
                        <div class="item">
                            <div class="ui checkbox">
                                <input id="{{ str_slug($category->name) }}" type="checkbox" name="category">
                                <label for="{{ str_slug($category->name) }}">{{ $category->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#is_remote').click(function() {
            if ($('#is_remote').prop('checked')) {
                $('#location').addClass('disabled');
                $('input[name=location]').prop('disabled', true);
            } else {
                $('#location').removeClass('disabled');
                $('input[name=location]').prop('disabled', false);
            }
        });
    </script>
@endpush

@extends('layouts.app')

@section('title', 'Connects talented Nigerian developers and designers with companies who needs them')
@section('meta-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them.')
@section('og-title', 'Naijadevs')
@section('og-url', url('/'))
@section('og-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')
@section('twitter-title', 'Naijadevs')
@section('twitter-description', 'Naijadevs connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable grid container">
        <div class="twelve wide column">
            
            @include('partials._filters')

            <div class="ui divider"></div>

            @if ($jobs->isEmpty())
                <p>Sorry!!! There are currently no open jobs.</p>
            @else
                <div class="ui unstackable divided relaxed items">
                    @foreach ($jobs as $job)
                        <div class="item">
                            <div class="ui tiny image">
                                <img src="{{ $job->creator->company_logo ? asset($job->creator->company_logo) : asset('images/company_logo.png') }}">
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

        <div class="four wide column">
            @include('partials._sidebar')
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

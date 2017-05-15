@extends('layouts.app')

@section('title', 'My Jobs')

@section('content')
    <div class="ui container">
        <div class="ui padded">
            @if ($jobs->isEmpty())
                <p>Oops!!! Looks like you haven't created any jobs yet. <a href="{{ route('post_job') }}">Create one</a> now!</p>
            @else
                <div class="ui divided relaxed items">
                    @foreach ($jobs as $job)
                        <div class="item">
                            <div class="ui tiny image">
                                <img src="{{ $job->creator->company_logo }}">
                            </div>
                            <div class="content">
                                <a class="header" href="{{ $job->path() }}">
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
        </div>
    </div>
@endsection
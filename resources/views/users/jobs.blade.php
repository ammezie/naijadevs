@extends('layouts.app')

@section('title', 'My Jobs')

@section('content')
    <div class="ui stackable grid container">
        <div class="four wide column">
            @include('users.partials._user_nav')
        </div>

        <div class="twelve wide column">
            @include('includes.flash.success')
            
            @if ($jobs->isEmpty())
                <p>Oops!!! Looks like you haven't created any jobs yet. <a href="{{ route('post_job') }}">Create one</a> now!</p>
            @else
                <div class="ui horizontal statistic">
                    <div class="value">
                        {{ $jobs->count() }}
                    </div>
                    <div class="label">
                        {{ str_plural('job', $jobs->count()) }}
                    </div>
                </div>

                <div class="ui divider"></div>

                <div class="ui divided relaxed items">
                    @foreach ($jobs as $job)
                        <div class="item">
                            <div class="content">
                                <a class="header" href="{{ url($job->path()) }}">
                                    {{ $job->title }}
                                </a>
                                <div class="meta">
                                    <span class="ui category">
                                        <div class="ui tiny basic {{ $job->category->color }} label">
                                            {{ $job->category->name }}
                                        </div>
                                    </span>
                                    <span class="ui type">
                                        <div class="ui tiny basic {{ $job->type->color }} label">
                                            {{ $job->type->name }}
                                        </div>
                                    </span>
                                    <span class="location">
                                        <i class="red {{ $job->is_remote ? 'world' : 'marker' }} icon"></i>
                                        {{ $job->is_remote ? 'Remote' : $job->location->name }}
                                    </span>
                                    <span class="ui right floated">
                                        <a class="ui label" href="{{ url('/jobs/' . $job->id .'/edit') }}">
                                            <i class="edit icon"></i>
                                            Edit Job
                                        </a>
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
    </div>
@endsection
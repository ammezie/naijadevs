@extends('layouts.app')

@section('title', 'Connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui mobile reversed stackable grid container">
        <div class="four wide column">
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
                                <input id="type" type="checkbox" name="type">
                                <label for="type">{{ $type->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <h4 class="ui header">Category</h4>
                <div class="ui list">
                    @foreach ($categories as $category)
                        <div class="item">
                            <div class="ui checkbox">
                                <input id="category" type="checkbox" name="category">
                                <label for="category">{{ $category->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="twelve wide column">
            <div class="ui raised padded segment">
                @if ($jobs->isEmpty())
                    <p>Sorry!!! There are currently no jobs posted.</p>
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
                                        {{-- <span class="salary">
                                            @if (! is_null($job->salary))
                                            <div class="item">
                                                ₦{{ ($job->salary/1000) }}k
                                            </div>
                                            @endif
                                        </span> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="ui center aligned one column grid">
                <div class="column wide">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

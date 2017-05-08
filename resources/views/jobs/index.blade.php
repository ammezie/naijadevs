@extends('layouts.app')

@section('title', 'Connects talented Nigerian developers and designers with companies who needs them')

@section('content')
    <div class="ui stackable internally celled grid container">
        <div class="three wide column">
            <div class="filter">
                <h3 class="ui dividing header">Filters</h3>

                <h4 class="ui header">Type</h4>
                @foreach ($jobTypes as $type)
                    <input type="checkbox" name="type"> {{ $type->name }}
                @endforeach

                <h4 class="ui header">Category</h4>
                @foreach ($categories as $category)
                    <input type="checkbox" name="category"> {{ $category->name }}
                @endforeach
            </div>
        </div>

        <div class="thirteen wide column">
            @if ($jobs->isEmpty())
                <p>Sorry!!! There are currently no jobs posted.</p>
            @else
                <div class="ui divided relaxed link items">
                    @foreach ($jobs as $job)
                        <div class="item">
                            <div class="ui tiny image">
                                <img src="{{ $job->creator->company_logo }}">
                            </div>
                            <div class="content">
                                <div class="header">
                                    {{ $job->title }}
                                </div>
                                <div class="meta">
                                    <span class="type">
                                        {{ $job->type->name }}
                                    </span>
                                    <span class="category">
                                        {{ $job->category->name }}
                                    </span>
                                    <span class="location">
                                        <i class="red marker icon"></i>
                                        {{ $job->is_remote ? 'Remote' : $job->location->name }}
                                    </span>
                                    @if (! is_null($job->salary))
                                        <span class="salary">
                                            <i class="red money icon"></i>
                                            ₦{{ ($job->salary/1000) }}k
                                        </span>
                                    @endif
                                </div>
                                <div class="description">
                                    
                                </div>
                                <div class="extra">
                                    Additional details
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

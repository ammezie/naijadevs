@extends('layouts.app')

@section('title')
    {{ $company->company_name }}
@stop

@section('meta-description', str_limit($company->company_about, 160))
@section('og-title', $company->company_name)
@section('og-url', url($company->path()))
@section('og-description', str_limit($company->company_about, 160))
@section('twitter-title',  $company->company_name)
@section('twitter-description', str_limit($company->company_about, 160))

@section('content')
    <div class="ui container" style="padding-top: 50px; padding-bottom: 50px">
        <div class="ui basic segment">
            <div class="ui items">
                <div class="item">
                    @if (! is_null($company->company_logo))
                        <div class="ui small image">
                            <img src="{{ asset($company->company_logo) }}" alt="Company Logo">
                        </div>
                    @endif
                    <div class="content">
                        <h1 class="header">
                            {{ $company->company_name }}
                        </h1>
                        <div class="description">
                            <p>{{ $company->company_about }}</p>
                        </div>
                        <div class="extra">
                            @if ($company->location)
                                <div class="ui basic label">
                                    <i class="red marker icon"></i>
                                    {{ $company->location->name }}
                                </div>
                            @endif
                            <a class="ui basic label" href="{{ $company->company_website }}" target="_blank">
                                <i class="red linkify icon"></i>
                                {{ $company->company_website }}
                            </a>
                            <div class="ui right floated horizontal statistic">
                                <div class="value">
                                    {{ $jobs->count() }}
                                </div>
                                <div class="label">
                                    {{ $jobs->isEmpty() ? 'open job' : str_plural('open job', $jobs->count()) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui divider"></div>
        <div class="ui hidden divider"></div>

        <div class="ui text container">
            <div class="ui medium horizontal divider header">Job Openings</div>
            
            @if ($jobs->isEmpty())
                <p>There are currently no job openings.</p>
            @else
                <div class="ui divided items">
                    @foreach ($jobs as $job)
                        <div class="item">
                            <div class="content">
                                <a class="header" href="{{ $job->path() }}">
                                    {{ $job->title }}
                                </a>
                                <div class="meta">
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

            <div class="ui center aligned container">
                {{ $jobs->links() }}
            </div>
        </div> 
    </div>
@endsection
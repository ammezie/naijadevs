@extends('layouts.app')

@section('title')
    {{ $job->title }}
@stop

@section('content')
    <div class="ui stackable grid container">
        <div class="twelve wide column">
            <div class="ui divided grid">
                <div class="three wide column">
                    @if (! is_null($job->creator->company_logo))
                    <div class="ui middle aligned image">
                        <img src="{{ asset($job->creator->company_logo) }}">
                    </div>
                    @endif
                </div>
                <div class="thirteen wide column">
                    <h2 class="ui header">
                        {{ $job->title }}
                    </h2>

                    <div class="ui horizontal list">
                        <div class="item">
                            <a class="ui basic {{ $job->type->color }} label">
                                {{ $job->type->name }}
                            </a>
                        </div>
                        <div class="item">
                            <a class="ui basic {{ $job->category->color }} label">
                                {{ $job->category->name }}
                            </a>
                        </div>
                        @if (! is_null($job->salary))
                        <div class="item">
                            <i class="red money icon"></i>
                            ₦{{ ($job->salary/1000) }}k
                        </div>
                        @endif
                        <div class="item">
                            <i class="red {{ $job->is_remote ? 'world' : 'marker' }} icon"></i>
                            {{ $job->is_remote ? 'Remote' : $job->location->name }}
                        </div>
                        <div class="item">
                            <i class="red calendar icon"></i>
                            {{ $job->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui divider"></div>
            <div class="ui hidden divider"></div>

            <div class="ui one grid">
                <div class="column wide">
                    <h3 class="ui dividing header">Job Description</h3>

                    <div class="job_description">
                        @markdown($job->description)
                    </div>
                </div>
            </div>

            <div class="ui section divider"></div>

            <div class="ui one grid">
                <div class="column wide">
                    <a 
                        href="{{ ($job->apply == 'url') ? $job->apply_url : 'mailto:' . $job->apply_email . '?subject=' . rawurlencode($job->apply_email_subject) }}"
                        class="ui primary button"
                        {{ ($job->apply == 'url') ? 'target=_blank' : ''  }}>
                        <i class="{{ ($job->apply == 'url') ? 'external' : 'mail'  }} icon"></i>
                        Apply Now
                    </a>
                </div>
            </div>
        </div>

        <div class="four wide column">
            <a 
                href="{{ ($job->apply == 'url') ? $job->apply_url : 'mailto:' . $job->apply_email . '?subject=' . rawurlencode($job->apply_email_subject) }}"
                class="fluid ui primary button"
                {{ ($job->apply == 'url') ? 'target=_blank' : ''  }}>
                <i class="{{ ($job->apply == 'url') ? 'external' : 'mail'  }} icon"></i>
                Apply Now
            </a>

            <div class="ui fluid card">
                @if (! is_null($job->creator->company_logo))
                <div class="ui image">
                    <img src="{{ asset($job->creator->company_logo) }}">
                </div>
                @endif
                <div class="center aligned content">
                    <div class="header">
                        {{ $job->creator->company_name }}
                    </div>
                    <div class="meta">
                        @if ($job->creator->location)
                           <i class="marker icon"></i>
                           <span class="location">
                               {{ $job->creator->location->name }}
                           </span>
                       @endif
                    </div>
                    <div class="description">
                        <p>
                            {{ $job->creator->company_about }}
                        </p>
                    </div>
                </div>
                <div class="extra content">
                    <div class="ui two buttons">
                        <a
                            href="{{ $job->creator->company_website }}"
                            class="ui basic grey button" target="_blank">
                            <i class="red linkify icon"></i> Visit
                        </a>
                        <a
                            href="{{ url('/about') }}"
                            class="ui basic grey button">
                            <i class="red suitcase icon"></i> Jobs
                        </a>
                    </div>
                </div>
            </div>

            <div class="ui segment">
                <div class="ui animated relaxed divided list">
                    <a href="" class="item">
                        <i class="twitter icon"></i>
                        Tweet this job
                    </a>
                    <a href="" class="item">
                        <i class="linkedin icon"></i>
                        Share on LinkedIn
                    </a>
                    <a href="" class="item">
                        <i class="facebook icon"></i>
                        Share on Facebook
                    </a>
                    <a href="" class="item">
                        <i class="mail icon"></i>
                        Mail to a friend
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
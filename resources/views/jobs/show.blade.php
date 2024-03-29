@extends('layouts.app') @section('title') {{ $job->title }} at {{ $job->creator->company_name }} @stop @section('meta-description',
str_limit($job->description, 160)) @section('og-title', $job->title) @section('og-url', url($job->path())) @section('og-description',
str_limit($job->description, 160)) @section('twitter-title', $job->title) @section('twitter-description', str_limit($job->description,
160)) @section('content')
<div class="ui stackable grid container" style="padding-top: 50px; padding-bottom: 50px">
	<div class="twelve wide column">
		<div class="ui basic segment bgWhite roundBordered">
			<div class="ui unstackable items">
				<div class="item">
					<a class="ui tiny image" href="{{ url($job->creator->path()) }}">
						<img src="{{ $job->creator->company_logo ? asset('storage/' . $job->creator->company_logo) : asset('images/company_logo.png') }}">
					</a>
					<div class="content">
						<h1 class="ui header">
							{{ $job->title }}
						</h1>

						<div class="meta">
							<span class="ui basic {{ $job->type->color }} label">
								{{ $job->type->name }}
							</span>
							<span class="ui basic {{ $job->category->color }} label">
								{{ $job->category->name }}
							</span>
							@if (! is_null($job->salary))
							<span>
								<i class="red money icon"></i>
								₦{{ ($job->salary/1000) }}k
							</span>
							@endif
							<span class="item">
								<i class="red {{ $job->is_remote ? 'world' : 'marker' }} icon"></i>
								{{ $job->is_remote ? 'Remote' : $job->location->name }}
							</span>
							<span class="item">
								<i class="red calendar icon"></i>
								{{ $job->created_at->diffForHumans() }}
							</span>
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
					<a href="{{ ($job->apply == 'url') ? $job->apply_url : 'mailto:' . $job->apply_email . '?subject=' . rawurlencode($job->apply_email_subject) }}"
					class="ui primary button" {{ ($job->apply == 'url') ? 'target=_blank' : '' }}>
						<i class="{{ ($job->apply == 'url') ? 'external' : 'mail'  }} icon"></i>
						Apply Now
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="four wide column">
		<div class="ui fluid companyCard card">
			<a
				href="{{ ($job->apply == 'url') ? $job->apply_url : 'mailto:' . $job->apply_email . '?subject=' . rawurlencode($job->apply_email_subject) }}"
				class="ui bottom attached primary button"
				{{ ($job->apply == 'url') ? 'target=_blank' : '' }}>
				<i class="{{ ($job->apply == 'url') ? 'external' : 'mail'  }} icon"></i>
				Apply Now
			</a>
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
				<div class="left aligned description">
					<p>
						{{ $job->creator->company_about }}
					</p>
				</div>
			</div>
			<div class="extra content">
				<div class="ui two buttons">
					<a href="{{ $job->creator->company_website }}" class="ui basic grey button" target="_blank">
						Website
					</a>
					<a href="{{ url($job->creator->path()) }}" class="ui basic grey button">
						Jobs
					</a>
				</div>
			</div>
		</div>

		<div class="ui basic segment bgWhite roundBordered">
			<div class="ui animated relaxed divided list">
				<a class="item" href="https://twitter.com/intent/tweet?text={{ $job->title . ' at ' . $job->creator->company_name }}&url={{ urlencode(url($job->path())) }}&hashtags={{ strtolower($job->category->name) }}, {{ strtolower(str_replace(' ', '', $job->type->name)) }}, {{ $job->is_remote ? 'remote' : strtolower($job->location->name) }}&via=naijadevs_ng"
				 target="_blank">
					<i class="twitter icon"></i>
					Tweet this job
				</a>
				<a class="item" href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url($job->path())) }}&title={{ $job->title . ' at ' . $job->creator->company_name }}&summary={{ str_limit($job->description, 160) }}"
				 target="_blank">
					<i class="linkedin icon"></i>
					Share on LinkedIn
				</a>
				<a class="item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url($job->path())) }}" target="_blank">
					<i class="facebook icon"></i>
					Share on Facebook
				</a>
				@php $newline = '%0D%0A'; $doubleNewline = '%0D%0A%0D%0A'; $jobTile = $job->title . ' at ' . $job->creator->company_name;
				$jobPath = url($job->path()); $jobDescription = str_limit($job->description, 160); $body = "Hi$doubleNewline I found
				this job on Naijadevs and was thinking you might be interested:$doubleNewline $jobTile $newline $jobDescription $newline
				$jobPath"; @endphp
				<a class="item" href="mailto:?subject={{ rawurlencode($job->title . ' at ' . $job->creator->company_name) }}&body={{ $body }}"
				 target="_top">
					<i class="mail icon"></i>
					Mail to a friend
				</a>
			</div>
		</div>
	</div>
</div>
@endsection
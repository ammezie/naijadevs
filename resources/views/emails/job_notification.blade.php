<p>
    Here is the latest job on Naijadevs as per your request:
</p>

<p>
    Job Title: <a href="{{ url($job->path()) }}">{{ $job->title }}</a> <br>
    Location: {{ $job->is_remote ? 'Remote' : $job->location->name }} <br>
    Posted: {{ $job->created_at->diffForHumans() }}
</p>

<p>
    Know someone that might be interested in this job? send to friend
</p>

<p>
    Regards,<br>
    {{ config('app.name') }}
</p>

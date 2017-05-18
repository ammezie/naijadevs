<p>
    This is a job notification as per your request:
</p>

Job Title: {{ $job->title }}
Job Decsription: {{ $job->description }}
Job Location: {{ $job->is_remote ? 'Remote' : $job->location->name }}

View Job

<p>
    Regards,<br>
    {{ config('app.name') }}
</p>

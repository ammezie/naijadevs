<?php

namespace App\Listeners;

use App\Events\JobCreated;
use Thujohn\Twitter\Facades\Twitter;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TweetPostedJob implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobCreated  $event
     * @return void
     */
    public function handle(JobCreated $event)
    {
        $jobType = strtolower(str_replace(' ', '', $event->job->type->name));
        $jobCategory = strtolower($event->job->category->name);
        $jobLocation = $event->job->is_remote ? 'remote' : strtolower($event->job->location->name);

        $status = $event->job->creator->company_name . ' is looking for a ' . $event->job->title . ' ' . url($event->job->path()) . ' #' . $jobCategory . ' #' . $jobType . ' #' . $jobLocation;

        // Build tweet
        $tweet = [
            'status' => $status,
            'format' => 'json'
        ];

        // Tweet about job created
        Twitter::postTweet($tweet);
    }
}

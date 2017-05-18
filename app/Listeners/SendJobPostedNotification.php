<?php

namespace App\Listeners;

use App\Events\JobCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\Notifications\JobPostedInterface;

class SendJobPostedNotification implements ShouldQueue
{
    /**
     * @var \App\Repositories\Notifications\JobPostedInterface
     */
    protected $jobPostedNotifier;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(JobPostedInterface $jobPostedNotifier)
    {
        $this->jobPostedNotifier = $jobPostedNotifier;
    }

    /**
     * Handle the event.
     *
     * @param  JobCreated  $event
     * @return void
     */
    public function handle(JobCreated $event)
    {
        $body = view('emails.job_notification', ['job' => $event->job])->render();

        $this->jobPostedNotifier->notify($event->job->title, $body);
    }
}

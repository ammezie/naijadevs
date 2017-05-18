<?php

namespace App\Repositories\Notifications\Mailchimp;

use DrewM\MailChimp\MailChimp;
use App\Repositories\Notifications\JobPostedInterface;

class JobPosted implements JobPostedInterface
{
    /**
     * @var mailchimp
     */
    protected $mailchimp;

    public function __construct()
    {
        $this->mailchimp = new MailChimp(config('services.mailchimp.key'));
    }

    /**
     * [notify description]
     * @param string $title
     * @param mixed $body
     * @return mixed
     */
    public function notify($title, $body)
    {
        $data = [
            'type' => 'regular',

            'recipients' => [
                'list_id' => config('services.mailchimp.list'),
            ],

            'settings' => [
                'subject_line' => 'Job Notification: ' . $title,
                'from_name' => 'Naijadevs',
                'reply_to' => 'hello@naijadevs.ng',
            ],
        ];

        $content = [
            'html' => $body,
            'text' =>strip_tags($body),
        ];

        // Create campaign
        $campaign = $this->mailchimp->post('campaigns', $data);

        // Set campaign content
        $this->mailchimp->put('campaigns/' . $campaign['id'] . '/content', $content);

        // Send campaign
        $this->mailchimp->post('campaigns/' . $campaign['id'] . '/actions/send');
    }
}

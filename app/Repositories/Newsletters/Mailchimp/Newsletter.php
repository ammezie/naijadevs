<?php

namespace App\Repositories\Newsletters\Mailchimp;

use DrewM\MailChimp\MailChimp;
use App\Repositories\Newsletters\NewsletterInterface;

class Newsletter implements NewsletterInterface
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
     * Subscribe a user to a Mailchimp list
     *
     * @param $list
     * @param $email
     * @return mixed
     */
    public function subscribeTo($list, $email)
    {
        return $this->mailchimp->post(
            'lists/' . $list . '/members',
            [
                'email_address' => $email,
                'status' => 'pending',
            ]
        );
    }

    /**
     * Unsubscribe a user to a Mailchimp list
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribeFrom($list, $email)
    {
        $subscriberHash = $this->mailchimp->subscriberHash($email);

        return $this->mailchimp->delete('lists/' . $list . '/members/'. $subscriberHash);
    }
}

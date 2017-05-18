<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Newsletters\NewsletterInterface;

class JobNotificationsController extends Controller
{
    /**
     * @var \App\Repositories\Newsletters\NewsletterInterface
     */
    protected $newsletter;

    public function __construct(NewsletterInterface $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Subscribe user to a newsletter list
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $this->newsletter->subscribeTo(config('services.mailchimp.list'), $request->email);

        return 'Thanks for subscribing!';
    }

    /**
     * Unsubscribe user from a newsletter list
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(Request $request)
    {
        // unsubscribe user from list
        // $this->newsletter->unsubscribeFrom(config('services.mailchimp.list'), $request->email);
    }
}

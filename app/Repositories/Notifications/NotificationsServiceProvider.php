<?php

namespace App\Repositories\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Notifications\JobPostedInterface',
            'App\Repositories\Notifications\Mailchimp\JobPosted'
        );
    }
}

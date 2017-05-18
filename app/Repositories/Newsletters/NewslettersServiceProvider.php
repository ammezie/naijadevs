<?php

namespace App\Repositories\Newsletters;

use Illuminate\Support\ServiceProvider;

class NewslettersServiceProvider extends ServiceProvider
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
            'App\Repositories\Newsletters\NewsletterInterface',
            'App\Repositories\Newsletters\Mailchimp\Newsletter'
        );
    }
}

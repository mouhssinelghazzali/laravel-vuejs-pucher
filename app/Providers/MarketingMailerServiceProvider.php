<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MarketingMailerServiceProvider extends ServiceProvider
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
        $this->app['marketing-mailer'] = $this->app->share(function ($app) {
 
            return (new MailChimp(env('MAILCHIMP')));
 
        });
 
        $this->app->bind(MarketingMailerInterface::class, function ($app) {
 
            return $app['marketing-mailer'];
 
        });
    }
}

<?php

namespace App\Providers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Auth\Events\Login;
use App\Listeners\Login as UserLogin;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\LikeEvent' => [
            'App\Listeners\LikeEventListener',
        ], 
        'App\Events\DeleteReplyEvent' => [
            'App\Listeners\DeleteReplyEventListener',
        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
            Login::class => [UserLogin::class],
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

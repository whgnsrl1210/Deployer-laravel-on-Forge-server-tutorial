<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\ArticlesEvent::class => [
            \App\Listeners\ArticlesEventListener::class,
        ],

        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\UsersEventListener::class
        ],
        
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $subscribe = [
        \App\Listeners\UsersEventListener::class,
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
//\App\Events\ArticleCreated::class 이벤트가 발생하면 \App\Listeners\ArticlesEventListener::class 에게 처리를 위임한다
        \Event::listen(
             \App\Events\ArticleCreated::class,
             \App\Listeners\ArticlesEventListener::class
        );
        
    }
}

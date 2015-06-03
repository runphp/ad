<?php

namespace app\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'event.name' => ['EventListener'],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            \SocialiteProviders\Qq\QqExtendSocialite::class,
        ],
        'auth.login' => [
            \App\Handlers\Events\AuthLoginEventHandler::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}

<?php

namespace Nksquare\AuthLog\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
     /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Illuminate\Auth\Events\Login::class => [
            \Nksquare\AuthLog\Listeners\LoginSuccess::class,
        ],
        \Illuminate\Auth\Events\Failed::class => [
            \Nksquare\AuthLog\Listeners\LoginFailed::class,
        ],
        \Illuminate\Auth\Events\Logout::class => [
            \Nksquare\AuthLog\Listeners\Logout::class
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
    }
}

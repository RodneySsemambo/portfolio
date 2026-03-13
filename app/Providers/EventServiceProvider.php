<?php

namespace App\Providers;

use App\Events\postcreated;
use App\Listeners\postCacheListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class
        ],
        Postcreated::class => [
            postCacheListener::class
        ],
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

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
        'App\Events\UserTokenCreate'=>[
          'App\Listeners\SetUuid',
        ],
        'App\Events\ClientCreateOrUpdate'=>[
          'App\Listeners\SetLatLng',
        ],
        'App\Events\ClientCreatedOrUpdated'=>[
          'App\Listeners\SavePhotos',
        ],
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

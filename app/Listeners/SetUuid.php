<?php

namespace App\Listeners;

use App\Events\UserTokenCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Webpatser\Uuid\Uuid;

class SetUuid
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserTokenCreate  $event
     * @return void
     */
    public function handle(UserTokenCreate $event)
    {
      $event->userToken->id = Uuid::generate()->string;
    }
}

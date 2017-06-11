<?php

namespace App\Listeners;

use App\Events\ClientCreatedOrUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Client;

class SavePhotos
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
     * @param  ClientCreate  $event
     * @return void
     */
    public function handle(ClientCreatedOrUpdated $event)
    {
      if(Client::$FIRE_EVENTS){
        if (request()->hasFile('logo')) {
          $logoPath = request()->logo->storeAs('public/' . request()->name .'-'. $event->client->id,request()->name . "logo." . request()->logo->extension());
          $event->client->logo_url = $logoPath;
        }

        if(request()->hasFile('photo1')){
          $photo1Path = request()->photo1->storeAs('public/' . request()->name .'-'. $event->client->id,request()->name . "Image1." . request()->photo1->extension());
          $event->client->photo_1 = $photo1Path;
        }

        if(request()->hasFile('photo2')){
          $photo2Path = request()->photo2->storeAs('public/' . request()->name .'-'. $event->client->id,request()->name . "Image2." . request()->photo2->extension());
          $event->client->photo_2 = $photo2Path;
        }

        if(request()->hasFile('photo3')){
          $photo3Path = request()->photo3->storeAs('public/' . request()->name .'-'. $event->client->id,request()->name . "Image3." . request()->photo3->extension());
          $event->client->photo_3 = $photo3Path;
        }

        if(request()->hasFile('photo4')){
          $photo4Path = request()->photo4->storeAs('public/' . request()->name .'-'. $event->client->id,request()->name . "Image4." . request()->photo4->extension());
          $event->client->photo_4 = $photo4Path;
        }

        Client::$FIRE_EVENTS=false;
        $event->client->update();
        Client::$FIRE_EVENTS=true;
      }
    }
}

<?php

namespace App\Listeners;

use App\Events\ClientCreateOrUpdate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\City;
use App\Client;

class SetLatLng
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
    public function handle(ClientCreateOrUpdate $event)
    {
      if(Client::$FIRE_EVENTS){
        $city = City::find($event->client->city_id);
        $geocodeUrl='https://maps.googleapis.com/maps/api/geocode/json?address='.$event->client->street_number.'+'.str_replace(" ","+",$event->client->street).'+'.str_replace(" ","+",$city->name).'+'.str_replace(" ","+",$city->state_id).'&key='.env('GOOGLE_MAPS_KEY');
        $jsonresponse= json_decode(file_get_contents($geocodeUrl), true);

        $event->client->lat = $jsonresponse['results'][0]['geometry']['location']['lat'];
        $event->client->lng = $jsonresponse['results'][0]['geometry']['location']['lng'];
      }
    }
}

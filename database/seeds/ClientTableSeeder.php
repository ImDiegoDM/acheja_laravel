<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create(array(
          'name' => 'Alberto',
          'street' => 'Rua presbitero joão Rosa da Silva',
          'street_number' => 253,
          'lng' => 10,
          'lat' => 10,
          'category_id' => 1,
          'city_id' => 1,
          'description' => 'teste'
         ));
    }
}

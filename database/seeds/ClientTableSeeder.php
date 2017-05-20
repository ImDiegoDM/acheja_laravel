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
          'address' => 'Rua presbitero joão Rosa da Silva 253',
          'lng' => 10,
          'lat' => 10,
          'category_id' => 1,
          'city_id' => 1
         ));
    }
}

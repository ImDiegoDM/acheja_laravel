<?php

use Illuminate\Database\Seeder;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('CategoryTableSeeder');
         $this->call('StatesTableSeeder');
         $this->call('CitiesTableSeeder');
         $this->call('ClientTableSeeder');
    }
}

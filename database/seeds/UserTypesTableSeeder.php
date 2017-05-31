<?php

use Illuminate\Database\Seeder;
use App\UserType;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
          'name'=>'admin'
        ]);

        UserType::create([
          'name'=>'client'
        ]);
    }
}

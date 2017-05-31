<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Diego Matias',
            'user_type_id'=>1,
            'email' => 'dm.diego.bh@gmail.com',
            'phone' => '31991392245',
            'have_acess' => true,
            'confirm_email' => true,
            'password' => bcrypt('123456')
          ]);
    }
}

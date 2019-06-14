<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 1)->create([
        	'name' => 'Manager',
        	'email' => 'manager@gmail.com',
        	'user_type_id' => 1,
        	'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}

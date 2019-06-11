<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\UserType::class, 1)->create([
	        'usertype' => 'Manager',
	        
        ]);
        $users = factory(App\UserType::class, 1)->create([
	        'usertype' => 'Supervisor',
	        
        ]);
        $users = factory(App\UserType::class, 1)->create([
	        'usertype' => 'Sales_rep',
	        
    	]);
    }
}

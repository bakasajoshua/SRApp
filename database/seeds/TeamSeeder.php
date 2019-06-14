<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\Team::class, 1)->create([
	        'name' => 'Alpha',
        ]);
        $users = factory(App\Team::class, 1)->create([
	        'name' => 'Beta',
        ]);
        $users = factory(App\Team::class, 1)->create([
	        'name' => 'Omega',
    	]);
    }
}

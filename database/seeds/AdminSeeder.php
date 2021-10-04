<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Nabeel Siddiqui',
            'email' => 'nabeel.siddiqui@ev.com',
            'phone' => '0302-8283918',
            'cnic' => '33333-3333333-3',
            'address' => 'R-786 Block 10 Gulberg, Karachi ',
            'role_id' => 1,
            'password' => bcrypt('secret'),
            //'status_id' => 1,
            'city_id' => 1
        ]);
    }
}

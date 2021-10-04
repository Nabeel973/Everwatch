<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ateeb Roomi',
            'email' => 'ateeb.roomi@ev.com',
            'password' => bcrypt('secret'),
        ]);
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'image' => 'image3.png',
            'password' => bcrypt('abcd@1234'),
            'dob' => '2020-06-06',
        ]);

    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'example example',
            'email' => 'admin@example.net',
            'password' => Hash::make('23456789'),
        ]);
    }
}

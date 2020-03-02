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
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
    }
}

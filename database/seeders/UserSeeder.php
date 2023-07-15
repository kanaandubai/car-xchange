<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'active'=>true,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'active'=>true,
            'email' => 'janesmith@example.com',
            'password' => Hash::make('password'),
        ]);    }
}

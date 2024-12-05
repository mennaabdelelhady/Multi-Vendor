<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Menna Mahmoud',
            'email' => 'Menna@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '0123456789',
        ]);
    }
}

<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        User::create([
            'name' => 'Mohamed Mahmoud',
            'email' => 'Mohamed@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '1123456789',
        ]);
        User::create([
            'name' => 'Mostafa Mahmoud',
            'email' => 'Mostafa@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '2123456789',
        ]);

        DB::table('users')->insert([
            'name' => 'Maka',
            'email' => 'Maka@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '3123456789',
        ]);
    }
}

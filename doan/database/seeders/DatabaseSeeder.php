<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin1@gmail.com',
            'phone' => '0989748659',
            'avatar' => 'avatar.png',
            'password' => Hash::make('Trong03do@'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'customer1',
            'email' => 'customer1@gmail.com',
            'phone' => '213124342',
            'avatar' => 'avatar.png',   
            'password' => Hash::make('Trong03do@'),
            'role' => 'customer',   
        ]);
    }
}

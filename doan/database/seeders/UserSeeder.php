<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin1@gmail.com',
            'address' => 'aaaaaaaaaaaaaaaaaaaaaaaa',
            'phone' => '0989748659',
            'avatar' => 'avatar.png',
            'password' => Hash::make('admin1'),
            'role' => 'admin',
        ]);
        for ($i=1; $i < 10; $i++) { 
            User::factory()->create([
                'name' => 'customer' . $i,
                'email' => 'customer'. $i . '@gmail.com',
                'address' => 'aaaaaaaaaaaaaaaaaaaaaaaa',
                'phone' => $i,
                'avatar' => 'avatar.png',
                'password' => Hash::make('customer'. $i),
                'role' => 'customer',
            ]);
        }
    }
}

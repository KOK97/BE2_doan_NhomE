<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 6; $i++) {
            Address::factory()->create([
                'userID' => '' . $i,
                'tennguoinhan' => 'test' . $i,
                'sodienthoai' => '190012354' . $i,
                'diachi' => 'Phuong '.$i . ',Quan ' . $i . ',HCM',
                'diachimacdinh' => 0,
            ]);
        }
    }
}

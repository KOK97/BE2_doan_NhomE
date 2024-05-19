<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Sale::factory()->create([
            'discount' => '0',
            'sale_content' => 'Không áp dụng',
        ]);
        Sale::factory()->create([
            'discount' => '20',
            'sale_content' => '30/04,01/05',
        ]);

        Sale::factory()->create([
            'discount' => '30',
            'sale_content' => 'tết tây',
        ]);

        Sale::factory()->create([
            'discount' => '50',
            'sale_content' => 'Tết âm lịch',
        ]);

        for ($i = 1; $i < 3; $i++) {
            Sale::factory()->create([
                'discount' => '50' + $i,
                'sale_content' => 'nội dung' . $i,
            ]);
        }
    }
}

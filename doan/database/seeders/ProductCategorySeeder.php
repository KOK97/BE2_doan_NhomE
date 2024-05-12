<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::factory()->create([
            'product_id' => '4',
            'category_id' => '1',
        ]);

        for ($i = 1; $i < 8; $i++) {
            ProductCategory::factory()->create([
                'product_id' => ''.$i,
                'category_id' => ''.$i,
            ]);
        }
    }
}

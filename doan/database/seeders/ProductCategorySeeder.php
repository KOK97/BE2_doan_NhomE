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
            'product_id' => '1',
            'category_id' => '2',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '2',
            'category_id' => '2',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '3',
            'category_id' => '3',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '6',
            'category_id' => '3',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '6',
            'category_id' => '1',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '6',
            'category_id' => '5',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '7',
            'category_id' => '3',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '7',
            'category_id' => '1',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '8',
            'category_id' => '1',
        ]);
        ProductCategory::factory()->create([
            'product_id' => '8',
            'category_id' => '7',
        ]);

        for ($i = 1; $i < 19; $i++) {
            ProductCategory::factory()->create([
                'product_id' => ''.$i,
                'category_id' => ''.$i,
            ]);
        }
    }
}

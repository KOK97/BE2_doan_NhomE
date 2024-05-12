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
            'product_id' =>'1',
            'category_id' =>'4',
        ]);
        ProductCategory::factory()->create([
            'product_id' =>'1',
            'category_id' =>'11',
        ]);

        ProductCategory::factory()->create([
            'product_id' =>'4',
            'category_id' =>'1',
        ]);
        ProductCategory::factory()->create([
            'product_id' =>'4',
            'category_id' =>'11',
        ]);
        ProductCategory::factory()->create([
            'product_id' =>'4',
            'category_id' =>'13',
        ]);
    }
}

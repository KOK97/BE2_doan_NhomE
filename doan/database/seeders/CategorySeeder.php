<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'category_name' => 'Thiếu nhi',
        ]);
        Category::factory()->create([
            'category_name' => 'Trinh thám',
        ]);
        Category::factory()->create([
            'category_name' => 'Kinh dị',
        ]);
        Category::factory()->create([
            'category_name' => 'Khoa học',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::factory()->create([
            'name' => 'The End of Money',
            'price' => '307000',
            'reduced_price' => '291.650',
            'description' => 'The End of Money: Counterfeiters, Preachers, Techies, Dreamers--and the Coming Cashless Society
            For ages, money has been represented by little metal disks and rectangular slips of paper. ',
            'image' => 'TheEndofMoney.jpg',
            'publishing_year' => '2013',
            'sale_id' => '3',
            'author_id' => '1',
            'category_id' => '1',
        ]);
        Product::factory()->create([
            'name' => 'The End Of Men',
            'price' => '157000',
            'reduced_price' => '149.150',
            'description' => '
            Thông tin sản phẩm
            Mã hàng	9780008407964
            Tên Nhà Cung Cấp	Usborne
            ',
            'image' => 'TheEndOfMen.jpg',
            'publishing_year' => '2022',
            'sale_id' => '2',
            'author_id' => '1',
            'category_id' => '1',
        ]);
        Product::factory()->create([
            'name' => 'The End of Money',
            'price' => '307000',
            'reduced_price' => '291.650',
            'description' => 'Thông tin sản phẩm
            Mã hàng	9780008407964
            Tên Nhà Cung Cấp	Usborne
            Tác giả	Christina Sweeney-Baird',
            'image' => 'TheEndofMoney.jpg',
            'publishing_year' => '2013',
            'sale_id' => '2',
            'author_id' => '1',
            'category_id' => '1',
        ]);

       for ($i=1; $i < 4; $i++) { 
        Product::factory()->create([
            'name' => 'Product'.$i,
            'price' => '100'.$i,
            'reduced_price' => ''.$i,
            'description' => 'description for product '.$i,
            'image' => 'TheEndofMoney.jpg',
            'publishing_year' => '2013',
            'sale_id' => ''.$i,
            'author_id' => '1',
            'category_id' => '1',
        ]);
       }
    }
}

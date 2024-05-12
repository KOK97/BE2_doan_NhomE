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
            'reduced_price' => '291650',
            'description' => 'The End of Money: Counterfeiters, Preachers, Techies, Dreamers--and the Coming Cashless Society
            For ages, money has been represented by little metal disks and rectangular slips of paper. ',
            'image' => 'TheEndofMoney.jpg',
            'publishing_year' => '2013',
            'sale_id' => '3',
            'author_id' => '2',
        ]);
        Product::factory()->create([
            'name' => 'The End of Money',
            'price' => '307000',
            'reduced_price' => '291650',
            'description' => 'Thông tin sản phẩm
            Mã hàng	9780008407964
            Tên Nhà Cung Cấp	Usborne
            Tác giả	Christina Sweeney-Baird',
            'image' => 'TheEndofMoney.jpg',
            'publishing_year' => '2013',
            'sale_id' => '2',
            'author_id' => '3',
        ]);
        Product::factory()->create([
            'name' => 'Tết Ở Làng Địa Ngục',
            'price' => '169000',
            'reduced_price' => '113230',
            'description' => '
            Thông tin sản phẩm
            Mã hàng	8935212358279
            Tên Nhà Cung Cấp Đinh Tị
            Tác giả	Thảo Trang
            NXB	NXB Thanh Niên
            ',
            'image' => 'tetolangdianguc.jpg',
            'publishing_year' => '2022',
            'sale_id' => '2',
            'author_id' => '1',
        ]);
        Product::factory()->create([
            'name' => 'Có Hai Con Mèo Ngồi Bên Cửa Sổ',
            'price' => '100000',
            'reduced_price' => '70000',
            'description' => '
            Thông tin sản phẩm
            Mã hàng	8934974185178
            Tên Nhà Cung Cấp	NXB Trẻ
            Tác giả	Nguyễn Nhật Ánh
            NXB	Trẻ
            ',
            'image' => 'co-hai-con-meo-ngoi-ben-cua-so.jpg',
            'publishing_year' => '2023',
            'sale_id' => '3',
            'author_id' => '3',
        ]);
        for ($i = 1; $i < 4; $i++) {
            Product::factory()->create([
                'name' => 'Tết Ở Làng Địa Ngục'.$i,
                'price' => '169000',
                'reduced_price' => '113230',
                'description' => '
                Thông tin sản phẩm
                Mã hàng	8935212358279
                Tên Nhà Cung Cấp Đinh Tị
                Tác giả	Thảo Trang
                NXB	NXB Thanh Niên
                ',
                'image' => 'tetolangdianguc.jpg',
                'publishing_year' => '2022',
                'sale_id' => '2',
                'author_id' => '1',
            ]);
        }
    }
}

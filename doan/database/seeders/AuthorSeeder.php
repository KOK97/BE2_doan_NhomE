<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Author::factory()->create([
            'author_name' => 'Thảo Trang',
            'pseudonym' => 'Trangcute',
            'year_of_birth' => '1991',

        ]);
        Author::factory()->create([
            'author_name' => 'Christina Sweeney-Baird',
            'pseudonym' => '',
            'year_of_birth' => '1993',

        ]);
        Author::factory()->create([
            'author_name' => 'Nguyễn Nhật Ánh',
            'pseudonym' => '',
            'year_of_birth' => '1955',

        ]);
        for ($i = 1; $i < 17; $i++) {
            Author::factory()->create([
                'author_name' => 'Tác giả' . $i,
                'pseudonym' => '' . $i,
                'year_of_birth' => '1900' + $i,

            ]);
        }
    }
}

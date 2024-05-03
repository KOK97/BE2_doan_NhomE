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
        $now = now();

        Category::factory()->create([
            'category_name' => 'Thiếu nhi',
            'category_description' => 'Thể loại thiếu nhi là một lĩnh vực trong văn học, điện ảnh, truyền hình và nhiều phương tiện truyền thông khác, được thiết kế đặc biệt để giải trí và giáo dục trẻ emThể loại thiếu nhi thường tập trung vào các câu chuyện, nhân vật và tình huống thích hợp cho trẻ em. Các tác phẩm trong thể loại này thường mang tính lịch sử tích cực, giáo dục và giúp trẻ em hiểu biết về thế giới xung quanh.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        Category::factory()->create([
            'category_name' => 'Trinh thám',
            'category_description' => 'Thể loại trinh thám tập trung vào việc phân tích và giải quyết các vụ án hoặc bí ẩn. Những câu chuyện trong thể loại này thường xoay quanh việc tìm hiểu về nạn nhân, tìm kiếm dấu vết và khám phá bí mật để phục hồi lại sự thật.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        Category::factory()->create([
            'category_name' => 'Kinh dị',
            'category_description' => 'Thể loại "kinh dị" là một thể loại trong văn học, điện ảnh, truyền hình và nhiều phương tiện truyền thông khác, tập trung vào việc tạo ra cảm giác sợ hãi, ám ảnh, hoặc kinh hoàng ở người xem hoặc độc giả.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        Category::factory()->create([
            'category_name' => 'Khoa học-viễn tưỡng',
            'category_description' => 'Thể loại khoa học viễn tưởng thường đặt trong một bối cảnh tương lai hoặc không gian ngoài trái đất, với các yếu tố khoa học và công nghệ nổi bật. Các câu chuyện trong thể loại này thường khám phá các khả năng của khoa học và công nghệ, cũng như tác động của chúng đối với con người và xã hội.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}

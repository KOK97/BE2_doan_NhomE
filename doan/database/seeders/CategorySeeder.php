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
            'category_description' => 'Thể loại thiếu nhi thường tập trung vào các câu chuyện, nhân vật và tình huống thích hợp cho trẻ em. Các tác phẩm trong thể loại này thường mang tính lịch sử tích cực, giáo dục và giúp trẻ em hiểu biết về thế giới xung quanh.',
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
            'category_description' => 'Thể loại kinh dị là một thể loại trong văn học, điện ảnh, truyền hình và nhiều phương tiện truyền thông khác, tập trung vào việc tạo ra cảm giác sợ hãi, ám ảnh, hoặc kinh hoàng ở người xem hoặc độc giả.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Category::factory()->create([
            'category_name' => 'Khoa học-viễn tưỡng',
            'category_description' => 'Thể loại khoa học viễn tưởng thường đặt trong một bối cảnh tương lai hoặc không gian ngoài trái đất, với các yếu tố khoa học và công nghệ nổi bật. Các câu chuyện trong thể loại này thường khám phá các khả năng của khoa học và công nghệ, cũng như tác động của chúng đối với con người và xã hội.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Category::factory()->create([
            'category_name' => 'Tình cảm',
            'category_description' => 'Thể loại tình cảm thường tập trung vào các mối quan hệ giữa con người, thường là tình yêu và tình bạn. Nó thường mô tả cảm xúc sâu sắc, những trăn trở, niềm vui và nỗi đau mà con người trải qua khi yêu và được yêu. Thể loại này có thể đề cập đến nhiều khía cạnh của mối quan hệ, bao gồm sự giao tiếp, sự hiểu biết, lòng tin, sự hy sinh và sự phản bội.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Category::factory()->create([
            'category_name' => 'Giải đố',
            'category_description' => 'Thể loại giải đố là một dạng hình thức giải trí hoặc bài tập trí tuệ, yêu cầu người chơi suy luận, logic hoặc sáng tạo để tìm ra câu trả lời hoặc giải pháp. Các loại giải đố có thể xuất hiện ở nhiều hình thức khác nhau, từ câu đố vui đến bài toán toán học phức tạp.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Category::factory()->create([
            'category_name' => 'Cổ tích',
            'category_description' => 'Cổ tích là một thể loại văn học dành cho trẻ em và người lớn, chứa trong đó các câu chuyện phản ánh những giá trị văn hóa, đạo đức và triết lý thông qua việc sử dụng các nhân vật và sự kiện siêu hình. Cổ tích thường được truyền miệng từ thế hệ này sang thế hệ khác trước khi được viết lại và xuất bản.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        Category::factory()->create([
            'category_name' => 'Tâm lý',
            'category_description' => 'Thể loại tâm lý trong văn học, phim ảnh, và nghệ thuật nói chung, thường tập trung vào việc khám phá và mô tả tâm trạng, suy nghĩ, và hành vi của con người. Nó thường chạm vào những chủ đề như cảm xúc, ý thức, tâm lý học động lực, và các khía cạnh của tâm trí con người.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}

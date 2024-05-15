<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function showProductByCategory()
    {
        // Lấy 5 danh mục mới nhất
        $categories = Category::orderBy('created_at', 'desc')->take(5)->get();

        // Lấy danh sách ID của 5 danh mục mới nhất
        $categoryIds = $categories->pluck('id');

        // Lấy sản phẩm thuộc các danh mục đó
        $products = Product::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->get();

        // Lấy 3 sản phẩm có giảm giá nhiều nhất
        $topDiscountedProducts = Product::where('reduced_price', '>', 0)
            ->orderByRaw('((price - reduced_price) / price) DESC')
            ->take(3)
            ->get();

        // Lấy 3 bình luận mới nhất
        $latestReviews = Review::with('user')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('product.index', [
            'products' => $products,
            'categories' => $categories,
            'productshow' => $products,
            'topDiscountedProducts' => $topDiscountedProducts,
            'latestReviews' => $latestReviews
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('keyword', '');  // Default to empty string if keyword is not present
        $categories = Category::all();

        $products = Product::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('name', 'LIKE', "%$query%")
                ->orWhereHas('categories', function ($q) use ($query) {
                    $q->where('category_name', 'LIKE', "%$query%");
                });
        })
            ->paginate(5);

        $products->appends(['keyword' => $query]);

        $count = $products->total();

        if ($products->isEmpty()) {
            $message = 'Không tìm thấy kết quả tìm kiếm!';
            return view('product.search', compact('count', 'query', 'products', 'categories', 'message'));
        }

        return view('product.search', compact('count', 'query', 'products', 'categories'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

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
        // Lấy danh sách giở hàng
        if (Auth::check()) {
            $cartItem = Cart::all()->where('userID',Auth::id());
            return view('product.index', [
                'products' => $products,
                'categories' => $categories,
                'productshow' => $products,
                'topDiscountedProducts' => $topDiscountedProducts,
                'latestReviews' => $latestReviews
            ],compact('cartItem'));
        }
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
        $keyword = $request->input('keyword');

        $products = Product::select('products.id as idProduct', 'products.productName', 'products.productPrice', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
            ->join('categories', 'products.productCategory', '=', 'categories.id')
            ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
            ->where('products.productName', 'like', '%' . $keyword . '%')
            ->groupBy('products.id', 'products.productName', 'products.productPrice')
            ->orderBy('products.created_at', 'desc')
            ->get();

        $count = 0;
        foreach ($products as $value) {
            $count++;
        }

        return view('website.search_products', compact('count', 'keyword', 'products'));
    }
}

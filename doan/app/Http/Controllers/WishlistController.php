<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        if (auth()->check()) {
            $products = DB::table('products')
                ->join('product_favorites', 'product_favorites.product_id', '=', 'products.id')
                ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
                ->groupBy('products.id', 'products.productName', 'products.productPrice')
                ->select('products.id', 'products.productName', 'products.productPrice', DB::raw('MIN(product_images.product_imageName) AS product_imageName'))
                ->where('product_favorites.user_id', '=', auth()->user()->id)
                ->get();
        } else {
            $products = null;
        }
        return view('wishlist.wishlist', compact('products', 'categories'));
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = 1; // Thay đổi thành Auth::id() nếu bạn muốn lấy ID của người dùng đã đăng nhập
    
        // Kiểm tra xem sản phẩm đã tồn tại trong danh sách mong muốn của người dùng hay chưa
        $existingWishlistItem = Wishlist::where('user_id', $userId)
                                        ->where('product_id', $productId)
                                        ->first();
    
        // Nếu sản phẩm đã tồn tại trong danh sách mong muốn của người dùng
        if ($existingWishlistItem) {
            return redirect()->route('product.wishlist')->with('message', 'Sản phẩm đã tồn tại trong danh sách wishlist của bạn.');
        }
    
        // Nếu sản phẩm chưa tồn tại trong danh sách mong muốn của người dùng, thêm vào
        $wishlist = new Wishlist([
            'product_id' => $productId,
            'user_id' => $userId,
        ]);
    
        $wishlist->save();
        return redirect()->route('Book Store')->with('success', 'Sản phẩm đã được thêm vào danh sách của bạn.');
    }

    public function destroy(Request $request)
    {
        $wishlist = Wishlist::find($request->wishlist_id);
        if ($wishlist) {
            $wishlist->delete();
        }
        return redirect()->back();
    }
}

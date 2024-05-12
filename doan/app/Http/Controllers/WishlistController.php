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
        $categories = Category::all();
        if (auth()->check()) {
            // Lấy ID của người dùng hiện tại
            $userId = Auth::id();

            // Lấy tất cả các sản phẩm trong danh sách mong muốn của người dùng cùng với thông tin về thể loại
            $products = Wishlist::where('wishlist.user_id', $userId)
                ->join('products', 'wishlist.product_id', '=', 'products.id')
                ->select('products.*', 'wishlist.wishlist_id AS wishlist_id')
                ->get();
        } else {
            $products = null;
        }
        return view('wishlist.wishlist', compact('products', 'categories'));
    }


    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = Auth::id();

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
        $wishlist = Wishlist::find($request->input('wishlist_id'));

        // Kiểm tra xem bản ghi có tồn tại không
        if ($wishlist) {
            // Nếu tồn tại, xóa bản ghi và chuyển hướng về trang wishlist với thông báo
            $wishlist->delete();
            return redirect()->route('product.wishlist')->with('message', 'Đã xóa sản phẩm ra khỏi wishlist !!');
        } else {
            // Nếu không tồn tại, chuyển hướng về trang trước đó
            return redirect()->back();
        }
    }

    public function removeAll()
    {
        $userId = Auth::id();

        // Tìm tất cả các sản phẩm trong danh sách mong muốn của người dùng
        $wishlistItems = Wishlist::where('user_id', $userId)->get();

        // Xóa từng sản phẩm trong danh sách mong muốn
        foreach ($wishlistItems as $item) {
            $item->delete();
        }

        // Chuyển hướng về trang wishlist với thông báo
        return redirect()->route('product.wishlist')->with('success', 'Tất cả các sản phẩm đã được xóa khỏi danh sách wishlist của bạn.');
    }
}

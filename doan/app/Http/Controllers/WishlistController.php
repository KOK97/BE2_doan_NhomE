<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

//API
/*
class WishlistController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $userId = Auth::id();
            $products = Wishlist::where('wishlist.user_id', $userId)
                ->join('products', 'wishlist.product_id', '=', 'products.id')
                ->select('products.*', 'wishlist.wishlist_id AS wishlist_id')
                ->orderBy('wishlist.created_at', 'desc')
                ->paginate(5);

            return response()->json([
                'success' => true,
                'data' => $products,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You are not login. Please login !!!',
            ], 401);
        }
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $userId = auth()->id();

            $query = Wishlist::query()
                ->join('products', 'wishlist.product_id', '=', 'products.id')
                ->select('products.*', 'wishlist.wishlist_id AS wishlist_id');

            if (auth()->check()) {
                $query->where('wishlist.user_id', $userId);
            }

            $products = $query->where('products.name', 'LIKE', "%$searchQuery%")
                ->orderBy('wishlist.created_at', 'desc')
                ->paginate(5);
            $products->appends(['search' => $searchQuery]);

            return response()->json([
                'success' => true,
                'data' => $products,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Không thấy kết quả cần tìm !!',
            ], 400);
        }
    }

    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $userId = Auth::id();

        $existingWishlistItem = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingWishlistItem) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm đã tồn tại trong wishlist',
            ], 409);
        }

        $wishlist = new Wishlist([
            'product_id' => $productId,
            'user_id' => $userId,
        ]);

        $wishlist->save();

        return response()->json([
            'success' => true,
            'message' => 'Thêm sản phẩm thành công !',
            'token' => $wishlist->createToken("wishlist_token")->plainTextToken,
        ]);
    }

    public function destroy(Request $request)
    {
        $wishlist = Wishlist::find($request->input('wishlist_id'));

        if ($wishlist) {
            $wishlist->delete();
            return response()->json([
                'success' => true,
                'message' => 'Xóa sản phẩm thành công !',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy sản phẩm !',
            ], 404);
        }
    }

    public function removeAll()
    {
        $userId = auth()->id();
        Wishlist::where('user_id', $userId)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Tất cả sản phẩm đã được xóa',
        ]);
    }
}
*/
class WishlistController extends Controller
{
    public function index()
    {
        $categoriesAll = Category::all();
        if (auth()->check()) {
            // Lấy ID của người dùng hiện tại
            $userId = Auth::id();

            // Lấy tất cả các sản phẩm trong danh sách mong muốn của người dùng cùng với thông tin về thể loại
            $products = Wishlist::where('wishlist.user_id', $userId)
                ->join('products', 'wishlist.product_id', '=', 'products.id')
                ->select('products.*', 'wishlist.wishlist_id AS wishlist_id')
                ->orderBy('wishlist.created_at', 'desc')
                ->paginate(5);
        } else {
            $products = null;
        }
        return view('wishlist.wishlist', compact('products', 'categoriesAll'));
    }

    public function search(Request $request)
    {
        $categoriesAll = Category::all();
        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $userId = auth()->id();

            $query = Wishlist::query()
                ->join('products', 'wishlist.product_id', '=', 'products.id')
                ->select('products.*', 'wishlist.wishlist_id AS wishlist_id');

            if (auth()->check()) {
                $query->where('wishlist.user_id', $userId);
            }

            $products = $query->where('products.name', 'LIKE', "%$searchQuery%")
                ->orderBy('wishlist.created_at', 'desc')
                ->paginate(5);
            $products->appends(['search' => $searchQuery]);

            if ($products->isEmpty()) {
                return redirect()->route('product.wishlist')->with('message', 'Không tìm thấy kết quả tìm kiếm!');
            }
            return view('wishlist.wishlist', compact('products', 'categoriesAll'));
        } else {
            return response(view('error'), 403);
        }
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
        $userId = auth()->id();

        // Xóa tất cả các sản phẩm trong danh sách mong muốn của người dùng
        Wishlist::where('user_id', $userId)->delete();

        // Chuyển hướng về trang wishlist với thông báo
        return redirect()->route('product.wishlist')->with('success', 'Tất cả các sản phẩm đã được xóa khỏi danh sách wishlist của bạn.');
    }
}
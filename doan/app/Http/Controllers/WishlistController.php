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

    public function WishlisttAdd(Request $request)
    {
        $productId = $request->input('product_id');
        $user = Auth::user();
        $wishlist = new Wishlist([
            'product_id' => $productId,
            'user_id' => $user->id,
        ]);

        $wishlist->save();

        return redirect()->back();
    }

    public function WishlistRemove(Request $request)
    {
        $wishlist = Wishlist::find($request->wishlist_id);
        if ($wishlist) {
            $wishlist->delete();
        }
        return redirect()->back();
    }
}

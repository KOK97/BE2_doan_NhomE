<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Author;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function viewCart()
    {
        if (Auth::check()) {
            $categories = Category::get();
            $check = 1;
            $userID = Auth::id();
            $cartItem = Cart::all()->where('userID',$userID );
            $idProduct = Cart::where('userID', $userID)->pluck('productID')->toArray();
            $products = Product::whereIn('id', $idProduct)->get();
            $authors = Author::all();
            $productcategorys = ProductCategory::all();
            return view('cart.cart', compact('cartItem', 'categories', 'idProduct', 'products','check','authors','productcategorys'));
        }
        else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }

    }
    public function addToCart(Request $request)
    {
        
        if (Auth::check()) {
            $userID = Auth::id();
            $carts = Cart::all()->where('userID', $userID);
            $cartItem = $carts->where('productID', $request->id)->first();
            $soluong = 1;
            if (!empty($request->input('soluong'))){
                $soluong = $request->input('soluong');        
            }
            if ($cartItem) {
                $cartItem->soluong++;
                $cartItem->save();
            } else {
                $cart = new Cart([
                    'userID' => $userID,
                    'productID' => $request->id,
                    'soluong' => $soluong,
                ]);
                $cart->save();
            }

            return redirect()->route('Book Store')->with('success', 'Thêm giỏ hàng thành công');
        } else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }
    }
    public function updateCart(Request $request, $idCartItem)
    {
        // code thêm Kiểm tra số lượng còn đủ để bán không
        $cartItem = Cart::find($idCartItem);
        $cartItem->soluong = $request->input('soluong');
        $cartItem->save();
        return redirect()->route('cart.view')->with('success', 'Sửa thành công');
    }
    public function deleteCart($idCartItem)
    {
        $cartItem = Cart::find($idCartItem);
        $cartItem->delete();
        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã xóa khỏi giỏ hàng');
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        if ($search == null) {
            $cartItem = Cart::all()->where('userID', 1);
            $idProduct = Cart::where('userID', 1)->pluck('productID')->toArray();
            $products = Product::whereIn('id', $idProduct)->get();
            return view('cart.cart', compact('cartItem', 'idProduct', 'products'));
        } else {
            $cartItems = Cart::all()->where('userID', 1);
            $productsKey = Product::where('name', 'LIKE', "%$search%")->get();
            $cartId = [];
            $productID = [];
            foreach ($cartItems as $cartItem) {
                foreach ($productsKey as $product) {
                    if ($cartItem->productID == $product->id) {
                        $cartId[] = $cartItem->id;
                        $productID[] = $product->id;
                    }
                }

            }
            $cartItem = Cart::whereIn('id', $cartId)->get();
            $products = Product::whereIn('id', $productID)->get();
            return view('cart.cart', compact('cartItems', 'products', 'cartItem'));
        }

    }
}

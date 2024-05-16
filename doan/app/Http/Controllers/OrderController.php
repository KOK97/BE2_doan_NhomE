<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Author;
use App\Models\ProductCategory;
use App\Models\User;

class OrderController extends Controller
{
    public function searchDonHang(Request $request)
    {
        $searchTrangThai = $request->input("optionTrangThai");
        $trangthai = '';
        if (Auth::check()) {
            $userID = Auth::id();
            $cartItem = Cart::all()->where('userID', $userID);
            $ordersID = Order::all()->where('userID', $userID)->pluck('id')->toArray();
            $user = User::find($userID);
            switch ($searchTrangThai) {
                case 'choxacnhan':
                    $orders = Order::where('userID', $userID)->where('trangthai', 'Chờ xác nhận')->get();
                    $orderItem = OrderItem::whereIn('orderID', $ordersID)->get();
                    $products = Product::all();
                    $categoriesAll = Category::get();
                    return view('oder.lichsu-order', compact('user','cartItem', 'orderItem', 'products', 'orders', 'categoriesAll'));
                    
                case 'daxacnhan':
                    $orders = Order::where('userID', $userID)->where('trangthai', 'Đã xác nhận')->get();
                    $orderItem = OrderItem::whereIn('orderID', $ordersID)->get();
                    $products = Product::all();
                    $categoriesAll = Category::get();
                    return view('oder.lichsu-order', compact('user','cartItem', 'orderItem', 'products', 'orders', 'categoriesAll'));
                    
                case 'dahuy':
                    $orders = Order::where('userID', $userID)->where('trangthai', 'Đã hủy')->get();
                    $orderItem = OrderItem::whereIn('orderID', $ordersID)->get();
                    $products = Product::all();
                    $categoriesAll = Category::get();
                    return view('oder.lichsu-order', compact('user','cartItem', 'orderItem', 'products', 'orders', 'categoriesAll'));
                    
                case 'dagiao':
                    $orders = Order::where('userID', $userID)->where('trangthai', 'Đã giao')->get();
                    $orderItem = OrderItem::whereIn('orderID', $ordersID)->get();
                    $products = Product::all();
                    $categoriesAll = Category::get();
                    return view('oder.lichsu-order', compact('user','cartItem', 'orderItem', 'products', 'orders', 'categoriesAll'));
                    
                default:
                    $orders = Order::where('userID', $userID)->get();
                    $orderItem = OrderItem::whereIn('orderID', $ordersID)->get();
                    $products = Product::all();
                    $categoriesAll = Category::get();
                    return view('oder.lichsu-order', compact('user','cartItem', 'orderItem', 'products', 'orders', 'categoriesAll'));

            }
            
        } else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }
    }
    public function viewlichSuOrder()
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $cartItem = Cart::all()->where('userID', $userID);
            $ordersID = Order::all()->where('userID', $userID)->pluck('id')->toArray();
            $orders = Order::all()->where('userID', $userID);
            $orderItem = OrderItem::whereIn('orderID', $ordersID)->get();
            $products = Product::all();
            $categoriesAll = Category::get();
            $user = User::find(Auth::user()->id);
            return view('oder.lichsu-order', compact('cartItem', 'orderItem', 'products', 'orders', 'categoriesAll','user'));
        } else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }
    }
    public function viewMyOders()
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $diaChis = Address::where('userID', $userID)->where('diachimacdinh', 1)->get();
            if ($diaChis->count() == 1) {
                $cartItem = Cart::all()->where('userID', $userID);
                $products = Product::all();
                $categoriesAll = Category::get();
                $authors = Author::all();
                $user = User::find($userID);
                $productcategorys = ProductCategory::all();
                return view('oder.myoder', compact('user','diaChis', 'cartItem', 'products', 'categoriesAll','authors','productcategorys'));
            } else {
                $diachi = Address::all()->where('userID', $userID);
                $cartItem = Cart::all()->where('userID', $userID);
                $products = Product::all();
                $categoriesAll = Category::get();
                $authors = Author::all();
                $productcategorys = ProductCategory::all();
                $user = User::find($userID);
                return view('address.diachi', compact('user','cartItem', 'diachi', 'products', 'categoriesAll','authors','productcategorys'));
            }
        } else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }
    }
    public function viewMyOder($idCart)
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $diaChis = Address::where('userID', $userID)->where('diachimacdinh', 1)->get();
            if ($diaChis->count() == 1) {
                $cartItem = Cart::where('userID', $userID)->where('id', $idCart)->get();
                $products = Product::all();
                $categoriesAll = Category::get();
                $authors = Author::all();
                $user = User::find($userID);
                $productcategorys = ProductCategory::all();
                return view('oder.myoder', compact('diaChis','user', 'cartItem', 'products', 'categoriesAll','authors','productcategorys'));
            } else {
                $diachi = Address::all()->where('userID', $userID);
                $cartItem = Cart::all()->where('userID', $userID);
                $products = Product::all();
                $categoriesAll = Category::get();
                $authors = Author::all();
                $user = User::find($userID);
                $productcategorys = ProductCategory::all();
                return view('address.diachi', compact('cartItem', 'user','diachi', 'products', 'categoriesAll','authors','productcategorys'));
            }
        } else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }
    }

    public function addsOrder(Request $request)
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $order = new Order();
            $order->userID = $userID;
            $order->hovaten = $request->input('hoten');
            $order->sodt = $request->input('sodt');
            $order->diachi = $request->input('diachi');
            $order->trangthai = 'Chờ xác nhận';
            $order->tongtien = $request->input('tongtien');
            $order->save();
            $carts = Cart::where('userID', $userID)->whereIn('id', $request->input('idItem'))->get();
            //$carts = Cart::all()->where('userID', $userID);
            foreach ($carts as $cartItem) {
                $oderItem = new OrderItem();
                $oderItem->orderID = $order->id;
                $oderItem->productID = $cartItem->productID;
                $oderItem->soluong = $cartItem->soluong;
                $product = Product::where('id', $cartItem->productID)->first();
                $oderItem->tongtien = $product->reduced_price * $cartItem->soluong;
                $oderItem->save();
                $cartItem->delete();
            }
            return redirect()->route('cart.view')->with('success', 'Đặt mua sản phẩm thành công');

        }
    }
    public function huyOrder($idOrder)
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $huyOrder = Order::where('id', $idOrder)->first();
            $huyOrder->trangthai = 'Đã hủy';
            $huyOrder->save();
            $cartItem = Cart::all()->where('userID', $userID);
            $ordersID = Order::all()->where('userID', $userID)->pluck('id')->toArray();
            $orders = Order::all()->where('userID', $userID);
            $orderItem = OrderItem::whereIn('orderID', $ordersID)->get();
            $products = Product::all();
            $categoriesAll = Category::get();
            $user = User::find($userID);
            return view('oder.lichsu-order', compact('user','cartItem', 'orderItem', 'products', 'orders', 'categoriesAll'));
        } else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }
    }
}

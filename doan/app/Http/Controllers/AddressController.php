<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;

class AddressController extends Controller
{
    public function viewDiaChi()
    {

        if (Auth::check()) {
            $userID = Auth::id();
            $diachi = Address::all()->where('userID', $userID);
            $cartItem = Cart::all()->where('userID', $userID);
            $products = Product::all();
            $categoriesAll = Category::get();
            $user = User::find($userID);
            // Lấy tổng số sản phẩm đã thêm vào wishlist của người dùng
            $totalItems = Wishlist::where('user_id', $user->id)->count();
            return view('address.diachi', compact('cartItem', 'user', 'diachi', 'products', 'categoriesAll', 'totalItems'));
        } else {
            return redirect()->route('auth.login')->with('success', 'Vui lòng đăng nhập');
        }
    }
    // Thêm mới địa chỉ
    public function addDiaChi(Request $request)
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $diaChis = Address::all()->where('userID', $userID);
            if ($diaChis->isEmpty()) {
                $diaChi = new Address();
                $diaChi->userID = $userID;
                $diaChi->tennguoinhan = $request->input('hovaten');
                $diaChi->sodienthoai = $request->input('sdt');
                $diaChi->diachimacdinh = 1;
                $diachi = $request->input('diachicuthe') . ',' . ' ' . $request->input('ward') . ',' . ' ' . $request->input('district') . ',' . ' ' . $request->input('province');
                $diaChi->diachi = $diachi;
                $diaChi->save();
                return redirect()->route('diachi.view')->with('success', 'Thêm mới địa chỉ thành công');
            } else {
                $diaChi = new Address();
                $diaChi->userID = $userID;
                $diaChi->tennguoinhan = $request->input('hovaten');
                $diaChi->sodienthoai = $request->input('sdt');
                if ($request->filled('checkbox')) {
                    // Checkbox đã được chọn
                    $diaChi->diachimacdinh = 1;
                    $diaChis = Address::all()->where('userID', $userID);
                    foreach ($diaChis as $item) {
                        $item->diachimacdinh = 0;
                        $item->save();
                    }
                } else {
                    $diaChi->diachimacdinh = 0;
                }
                $diachi = $request->input('diachicuthe') . ',' . ' ' . $request->input('ward') . ',' . ' ' . $request->input('district') . ',' . ' ' . $request->input('province');
                $diaChi->diachi = $diachi;
                $diaChi->save();
                // $ten = $request->input('sdt');
                return redirect()->route('diachi.view')->with('success', 'Thêm địa chỉ thành công');
                //return view('cart.carts');
            }
        }
    }
    // Xóa địa chỉ
    public function deleteDiaChi($idDiaChi)
    {
        $userID = Auth::id();
        $diaChis = Address::all()->where('userID', $userID);
        foreach ($diaChis as $diaChi) {
            if ($diaChi->id == $idDiaChi) {
                if (!$diaChi) {
                    return redirect()->route('diachi.view')->with('success', 'Lỗi địa chỉ không tồn tại');
                }
                if ($diaChi->diachimacdinh == 1) {

                    return redirect()->route('diachi.view')->with('success', 'Địa chỉ đang được dùng vui lòng chọn địa chỉ khác');
                } else {
                    $diaChi->delete();
                    return redirect()->route('diachi.view')->with('success', 'Xóa địa chỉ thành công');
                }
            }
        }
    }
    // Thay đổi địa chỉ mặc định
    public function updateDiaChiMacDinh($idDiaChi)
    {
        // $diaChi = Address::find($idDiaChi);
        // $diaChis = Address::all();
        // foreach ($diaChis as $item) {
        //     $item->diachimacdinh = 0;
        //     $item->save();
        // }
        // $diaChi->diachimacdinh = 1;
        // $diaChi->save();
        // return redirect()->route('diachi.view')->with('success', 'Thay đổi địa chỉ mặc định thành công');

        $userID = Auth::id();
        $diaChis = Address::all()->where('userID', $userID);
        foreach ($diaChis as $diaChi) {
            if ($diaChi->id == $idDiaChi) {
                $diaChi->diachimacdinh = 1;
                $diaChi->save();
            } else {
                $diaChi->diachimacdinh = 0;
                $diaChi->save();
            }
        }
        return redirect()->route('diachi.view')->with('success', 'Thay đổi địa chỉ mặc định thành công');
    }
}

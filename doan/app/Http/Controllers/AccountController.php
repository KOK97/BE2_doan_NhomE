<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    const ROLE_ADMIN = 'admin';

    public function login()
    {
        $categories = Category::get();
        return view('auth.login', compact('categories'));
    }

    public function register()
    {
        $categories = Category::get();
        return view('auth.register', compact('categories'));
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        Session::forget('favorite');

        return Redirect()->route('Book Store');
    }

    public function customLogin(Request $request)
    {
        $validatedData = Validator::make(
            $request->all(),
            [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:6|max:50',
            ],
            [
                'email.required' => 'Vui lòng cung cấp địa chỉ email của bạn.',
                'email.email' => 'Vui lòng cung cấp một địa chỉ email hợp lệ.',
                'email.max' => 'Địa chỉ email của bạn không được vượt quá 255 ký tự.',
                'password.required' => 'Vui lòng cung cấp mật khẩu.',
                'password.min' => 'Mật khẩu của bạn phải ít nhất 6 ký tự.',
                'password.max' => 'Mật khẩu của bạn không được vượt quá 50 ký tự.',
            ]
        );

        if ($validatedData->fails()) {
            if ($validatedData->errors()->has('email')) {
                $errors['email'] = $validatedData->errors()->first('email');
            }

            if ($validatedData->errors()->has('password')) {
                $errors['password'] = $validatedData->errors()->first('password');
            }
            return redirect()->route('auth.login')
                ->withErrors($errors)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === self::ROLE_ADMIN) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('Book Store');
            }
        } else {
            return redirect()->route('auth.login')->withInput()->withErrors(['error' => 'Thông tin đăng nhập không chính xác!']);
        }
    }

    public function customRegister(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'phone' => 'required|string|max:11',
            'email' => 'required|string|email|max:50|unique:users',
            'avatar' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif',
            'password' => 'required|string|min:6|max:50',
        ], [
            'name.required' => 'Vui lòng cung cấp tên của bạn.',
            'name.max' => 'Tên của bạn không được vượt quá 20 ký tự.',
            'phone.required' => 'Vui lòng cung cấp số điện thoại của bạn.',
            'phone.max' => 'Số điện thoại của bạn không được vượt quá 11 ký tự.',
            'email.required' => 'Vui lòng cung cấp địa chỉ email của bạn.',
            'email.email' => 'Vui lòng cung cấp một địa chỉ email hợp lệ.',
            'email.max' => 'Địa chỉ email của bạn không được vượt quá 50 ký tự.',
            'email.unique' => 'Địa chỉ email này đã được đăng ký.',
            'avatar.image' => 'Ảnh đại diện phải là một tệp hình ảnh.',
            'avatar.max' => 'Ảnh đại diện không được lớn hơn 2MB.',
            'avatar.mimes' => 'Ảnh đại diện phải là tệp JPEG, PNG, JPG, hoặc GIF.',
            'password.required' => 'Vui lòng cung cấp mật khẩu.',
            'password.min' => 'Mật khẩu của bạn phải ít nhất 6 ký tự.',
            'password.max' => 'Mật khẩu của bạn không được vượt quá 50 ký tự.',
        ]);

        if ($validatedData->fails()) {

            if ($validatedData->errors()->has('phone')) {
                $errors['phone'] = $validatedData->errors()->first('phone');
            }
            if ($validatedData->errors()->has('email')) {
                $errors['email'] = $validatedData->errors()->first('email');
            }

            if ($validatedData->errors()->has('name')) {
                $errors['name'] = $validatedData->errors()->first('name');
            }

            if ($validatedData->errors()->has('password')) {
                $errors['password'] = $validatedData->errors()->first('password');
            }

            if ($validatedData->errors()->has('avatar')) {
                $errors['avatar'] = $validatedData->errors()->first('avatar');
            }
            return redirect()->route('auth.register')
                ->withErrors($errors)
                ->withInput();
        }

        $user = new User();
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);

        // Avatar
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = 'user-' . $user->id . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $filename);
            $user->avatar = $filename;
        } else {
            $user->avatar = config('app.default_avatar', 'avatar.jpg');
        }

        $user->role = "customer";
        $user->save();

        return redirect()->route('auth.login')->with('success', 'Đăng ký thành công !');
    }

    public function account()
    {
        $user = auth()->user();
        $categories = Category::get();
        // Lấy tổng số sản phẩm đã thêm vào wishlist của người dùng
        $totalItems = Wishlist::where('user_id', $user->id)->count();
        return view('auth.dashboard', compact('user', 'categories', 'totalItems'));
    }

    public function profile()
    {
        $user = auth()->user();
        $categories = Category::get();
        // Lấy tổng số sản phẩm đã thêm vào wishlist của người dùng
        $totalItems = Wishlist::where('user_id', $user->id)->count();
        return view('auth.myprofile', compact('user', 'categories', 'totalItems'));
    }

    public function productRecent()
    {
        $user = auth()->user();
        $categories = Category::get();

        $totalItems = Wishlist::where('user_id', $user->id)->count();

        $recentProductIds = json_decode(Cookie::get('recent_products', '[]'), true);

        $recentProducts = Product::whereIn('id', $recentProductIds)
            ->orderBy('created_at', 'desc')
            ->get();

        // Sắp xếp sản phẩm theo thứ tự của recentProductIds
        $recentProducts = $recentProducts->sortBy(function ($product) use ($recentProductIds) {
            return array_search($product->id, $recentProductIds);
        });

        return view('auth.product-recent', compact('user', 'categories', 'totalItems', 'recentProducts'));
    }
}

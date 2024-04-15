<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AccountController extends Controller
{
    const ROLE_ADMIN = 'admin';

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

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
        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'phone' => 'required|string|max:11',
            'email' => 'required|string|email|max:255|unique:users',
            'avatar' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif',
            'password' => 'required|string|min:6,max:255',
        ], [
            'name.required' => 'Please provide your name.',
            'name.max' => 'Your name must not exceed 20 characters.',
            'phone.required' => 'Please provide your phone number.',
            'phone.max' => 'Your phone number must not exceed 11 characters.',
            'email.required' => 'Please provide your email address.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'Your email address must not exceed 255 characters.',
            'email.unique' => 'This email address has already been registered.',
            'avatar.image' => 'The avatar must be an image file.',
            'avatar.max' => 'The avatar must not be larger than 2MB.',
            'avatar.mimes' => 'The avatar must be a JPEG, PNG, JPG, or GIF file.',
            'password.required' => 'Please provide a password.',
            'password.min' => 'Your password must be at least 6 characters long.',
            'password.max' => 'Your password must not exceed 255 characters.',
        ]);

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

        return redirect()->route('auth.login')->with('success', 'Registration successful!');
    }
}

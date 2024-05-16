<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'like','customer')->paginate(5)->withPath(route('user.index'));
        $currentPage = $users->currentPage();
        $startIndex = ($currentPage - 1) * $users->perPage() + 1;
        return view('admin.user.index', compact('users', 'startIndex'));
    }

    public function search(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->where('role', 'like','customer');

        if ($request->has('search')) { // Kiểm tra xem có tham số search không
            $searchTerm = $request->input('search');
            $users = $users->where('name', 'like', '%' . $searchTerm . '%');
        }

        $users = $users->paginate(5)->withPath(route('user.index'));
        $currentPage = $users->currentPage();
        $startIndex = ($currentPage - 1) * $users->perPage() + 1;

        if ($users->isEmpty()) {
            return redirect()->route('user.index')->with('message', 'Không tìm thấy !!!');
        } else {
            return view('admin.user.index', compact('users', 'startIndex'));
        }
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:20',
                'phone' => 'required|string|max:11',
                'email' => 'required|string|email|max:50|unique:users',
                'avatar' => 'nullable|image|max:2048|mimes:jpeg,png,jpg,gif',
                'password' => 'required|string|min:6|max:50',
                'role' => 'required|string',
            ],
            [
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
            ]
        );
        //create user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        //avatar
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $filename = 'user' . '-' . time() . rand(1, 999) . '.' . $image->extension();
            $image->move(public_path('images/users'), $filename);
            $user->avatar = $filename;
        } else {
            $filename = 'avatar.png';
            $user->avatar = $filename;
        }
        $user->save();
        return redirect()->route('user.index')->with('success', 'Thêm thành công người dùng!');
    }
    public function destroy($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return back()->with('error', 'user not found');
        }
        $user->delete();
        return redirect()->route('user.index')->with('destroy', 'Đã xóa thành công người dùng!');
    }
    public function edit($user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return back()->with('error', 'user not found');
        }
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        if (!$user) {
            return back()->with('error', 'Người dùng không tồn tại');
        }
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user_id,
            'avatar' => 'nullable|image|max:2048',
            'password' => 'required|string|min:8,max:255',
            'role' => 'required|string',
        ]);
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                $oldImagePath = public_path('images/users/' . $user->avatar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Upload avagtar
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->move(public_path('images/users'), $avatarName);
            $user->avatar = $avatarName;
        }
        $user->name = $validatedData['name'];
        $user->phone = $validatedData['phone'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();
        return redirect()->route('user.index')->with('success', 'Đã cập nhật thành công người dùng!');
    }
}

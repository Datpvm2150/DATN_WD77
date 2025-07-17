<?php

namespace App\Http\Controllers\Auth;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerLoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        $danhMucs=DanhMuc::all();

        return view('auth.customer_login',compact('danhMucs'));
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required',
        ],
        [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không hợp lệ',
            'mat_khau.required' => 'Mật khẩu không được để trống',
        ]);

        // Tìm user theo email
        $user = User::where('email', $request->email)->first();

        // Kiểm tra mật khẩu
        if ($user && Hash::check($request->mat_khau, $user->mat_khau)) {
            // Đăng nhập người dùng
            Auth::login($user);

            // Chỉ cho phép login nếu là vai trò 'user'
            if ($user->vai_tro === 'user') {
                return redirect()->intended('/');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Tài khoản không phải khách hàng']);
            }
        }

        // Đăng nhập thất bại
        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
    }

    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
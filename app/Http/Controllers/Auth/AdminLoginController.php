<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {

        $danhMucs = DanhMuc::all();
        // khi vào admin bắt buộc phải đăng nhập lại
        /*  if (Auth::check()) {
            Auth::logout();
            return view('auth.admin_login');
        } else {
            return view('auth.admin_login');
        } */
        // // khi đăng nhập ở client có role:admin,staff thì không cần đăng nhập
        if (Auth::check()) {
            if (Auth::user()->vai_tro == 'admin' || Auth::user()->vai_tro == 'staff') {
                return redirect()->route('admin.dashboard');
            }
            return view('auth.admin_login', compact('danhMucs'));
        } else {
            return view('auth.admin_login', compact('danhMucs'));
        }
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate(
            [
                'email' => 'required|email',
                'mat_khau' => 'required',
            ],
            [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không hợp lệ',
                'mat_khau.required' => 'Mật khẩu không được để trống',
            ]
        );

        // Tìm user theo email
        $user = User::where('email', $request->email)->first();

        // Kiểm tra user tồn tại và mật khẩu khớp
        if ($user && Hash::check($request->mat_khau, $user->mat_khau)) {
            // Đăng nhập người dùng
            Auth::login($user);

            // Chuyển hướng theo vai trò
            if ($user->vai_tro == 'admin' || $user->vai_tro == 'staff') {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout(); // Logout nếu không phải admin/staff
                return redirect()->back()->withErrors(['email' => 'Bạn không có quyền truy cập']);
            }
        }

        // Thông tin đăng nhập không chính xác
        return redirect()->back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác']);
    }


    // Xử lý đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }
}

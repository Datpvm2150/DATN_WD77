<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class CustomerRegisterController extends Controller
{
    // Hiển thị trang đăng ký
    public function showRegistrationForm()
    {
        $danhMucs=DanhMuc::all();
        return view('auth.customer_register',compact('danhMucs'));
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mat_khau' => 'required|string|min:8',
            'so_dien_thoai' => ['required', 'regex:/^(0|\+84)\d{9}$/', 'max:10'], // Số điện thoại phải có 10 số và bắt đầu bằng 0 hoặc 84
            'ngay_sinh' => 'required|date',
        ],[
            'ten.required' => 'Tên không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'mat_khau.required' => 'Mật khẩu không được để trống.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'so_dien_thoai.required' => 'Số điện thoại không được để trống.',
            'so_dien_thoai.regex' => 'Số điện thoại không hợp lệ.',
            'so_dien_thoai.max' => 'Số điện thoại không được vượt quá 10 số.',
            'ngay_sinh.required' => 'Ngày sinh không được để trống.',
        ]
    );
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Tạo người dùng mới
        $user = User::create([
            'ten' => $request->input('ten'),
            'email' => $request->input('email'),
            'mat_khau' => Hash::make($request->input('mat_khau')),
            'so_dien_thoai' => $request->input('so_dien_thoai'),
            'ngay_sinh' => $request->input('ngay_sinh'),
            'vai_tro' => 'user', // Default role for new users
        ]);
    
    
        return redirect()->route('customer.login')->with('success', 'Đăng ký thành công.');
    }
}
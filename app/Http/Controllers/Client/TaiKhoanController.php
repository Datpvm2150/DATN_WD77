<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\lien_hes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{
    public function index() {
        //lấy thông tin người dùng đang đăng nhập
        $user = Auth::user();  // Lấy người dùng hiện tại
    }


    public function profileUser()
    {
        // lấy thông tin người dùng đăng đăng nhập
        $profile = Auth::user();
        $lienhes = lien_hes::where('user_id', $profile->id)->get();  // Lấy tất cả các bản ghi lien_hes cho người dùng này
        $danhMucs = DanhMuc::all();

        // Link
        return view('clients.taikhoan.profile', compact('danhMucs', 'profile', 'lienhes'));
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Xác thực mật khẩu cũ, mật khẩu mới và xác nhận mật khẩu mới
        $request->validate([
            'mat_khau_cu' => 'required', // Bắt buộc phải nhập mật khẩu cũ
            'mat_khau_moi' => 'required|min:8|confirmed' // Mật khẩu mới phải ít nhất 8 ký tự và khớp với xác nhận mật khẩu
        ]);

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->input('mat_khau_cu'), $user->mat_khau)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng.');
        }


        // Cập nhật mật khẩu mới
        $user->mat_khau = Hash::make($request->input('mat_khau_moi'));
        $user->save();

        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }

    public function edit($id){
        // Lấy thông tin người dùng theo ID
        $user = Auth::user();
        if ($user->id != $id) {
            return redirect()->route('customer.profileUser')->with('error', 'Bạn không có quyền chỉnh sửa thông tin của người dùng khác.');
        }
    }

    public function update(Request $request, string $id)
    {
        //Validate dữ liệu từ form
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dia_chi' => 'nullable|string',
        ]);

        $users = Auth::user();
        $users->ten = $request->get('ten');
        $users->email = $request->get('email');
        $users->so_dien_thoai = $request->get('so_dien_thoai');
        $users->dia_chi = $request->get('dia_chi');
        // Xử lý upload ảnh đại diện mới (nếu có)
        if ($request->hasFile('anh_dai_dien')) {
            // Xóa ảnh cũ nếu tồn tại
            if ($users->anh_dai_dien) {
                Storage::disk('public')->delete($users->anh_dai_dien);
            }

            // Lưu ảnh mới
            $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
            $users->anh_dai_dien = $filePath;
        }

        $users->save();
        return redirect()->route('customer.profileUser')->with('success', 'Cập nhật thông tin thành công');
    }
}

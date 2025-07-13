<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Hiển thị danh sách admin
    public function index()
    {
        $admins = User::where('vai_tro', 'admin') // <- thêm dòng này
            ->whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })
            ->get();

        return view('admins.admins.index', compact('admins'));
    }


    // Hiển thị form tạo admin mới
    public function create()
    {
        return view('admins.admins.create');
    }

    // Lưu admin mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mat_khau' => 'required|string|min:8|confirmed',
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dia_chi' => 'nullable|string',
            'ngay_sinh' => 'required|date',
        ]);

        // Xử lý upload ảnh đại diện
        $filePath = null;
        if ($request->hasFile('anh_dai_dien')) {
            $filePath = $request->file('anh_dai_dien')->store('avatars', 'public');
        }

        $user = User::create([
            'ten' => $request->ten,
            'email' => $request->email,
            'mat_khau' => Hash::make($request->mat_khau),
            'so_dien_thoai' => $request->so_dien_thoai,
            'anh_dai_dien' => $filePath,
            'vai_tro' => 'admin',
            'dia_chi' => $request->dia_chi,
            'ngay_sinh' => $request->ngay_sinh,
        ]);

        $user->assignRole('admin');

        return redirect()->route('admin.admins')->with('success', 'Admin đã được thêm thành công');
    }

    // Hiển thị thông tin chi tiết của admin
    public function show($id)
    {
        $admin = User::findOrFail($id);
        return view('admins.admins.show', compact('admin'));
    }

    // Hiển thị form chỉnh sửa admin
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admins.admins.edit', compact('admin'));
    }

    // Cập nhật thông tin admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'so_dien_thoai' => 'nullable|string|max:20',
            'anh_dai_dien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dia_chi' => 'nullable|string',
            'ngay_sinh' => 'required|date',
        ]);

        $user = User::findOrFail($id);
        if ($user->vai_tro !== 'admin') {
            return redirect()->back()->with('error', 'Bạn chỉ có thể sửa thông tin của người dùng có vai trò admin.');
        }

        $user->ten = $request->ten;
        $user->email = $request->email;
        $user->so_dien_thoai = $request->so_dien_thoai;
        $user->dia_chi = $request->dia_chi;
        $user->ngay_sinh = $request->ngay_sinh;

        if ($request->hasFile('anh_dai_dien')) {
            if ($user->anh_dai_dien) {
                Storage::disk('public')->delete($user->anh_dai_dien);
            }
            $path = $request->file('anh_dai_dien')->store('avatars', 'public');
            $user->anh_dai_dien = $path;
        }

        $user->save();

        return redirect()->route('admin.admins')->with('success', 'Cập nhật admin thành công!');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Models\DanhMuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DanhMucController extends Controller
{
    public function index()
    {
        $danhmucs = DanhMuc::all();
        return view('admins.danhmucs.index', compact('danhmucs'));
    }

    public function show($id)
    {
        $danhmucs = DanhMuc::findOrFail($id);
        return view('admins.danhmucs.show', compact('danhmucs'));
    }

    public function create()
    {
        return view('admins.danhmucs.create');
    }

    public function store(Request $request)
    {
        // Kiểm tra và xác thực dữ liệu
        // Sử dụng validate để xác thực dữ liệu
        $validatedData = $request->validate(
            [
                'ten_danh_muc' => 'required|string|max:255|unique:danh_mucs,ten_danh_muc',
                'mo_ta' => 'nullable|string',
                'anh_danh_muc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'ten_danh_muc.required' => 'Tên danh mục không được để trống',
                'ten_danh_muc.string' => 'Tên danh mục phải là chuỗi',
                'ten_danh_muc.unique' => 'Tên danh mục đã tồn tại',
                'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự',

                'anh_danh_muc.image' => 'Ảnh danh mục phải là ảnh',
                'anh_danh_muc.mimes' => 'Ảnh danh mục phải có đuôi jpg, png, jpeg, gif',
            ]
        );

        // Loại bỏ không lấy _token
        $params = $request->except('_token');

        // Xử lý ảnh nếu có
        if ($request->hasFile('anh_danh_muc')) {
            $fileName = time() . '_' . $request->file('anh_danh_muc')->getClientOriginalName();
            $filePath = $request->file('anh_danh_muc')->storeAs('danhmucs', $fileName, 'public');
            $params['anh_danh_muc'] = 'storage/' . $filePath;
        } else {
            $params['anh_danh_muc'] = null;
        }

        // Tạo mới danh mục
        DanhMuc::create($params);

        // Trả về thông báo thành công
        return redirect()->route('admin.danhmucs.index')->with('success', 'Thêm danh mục thành công');
    }
}

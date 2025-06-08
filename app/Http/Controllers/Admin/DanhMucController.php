<?php

namespace App\Http\Controllers\Admin;

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
                'ten_danh_mucunique' => 'Tên danh mục đã tồn tại',
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

    public function edit(string $id)
    {
        // Lấy danh mục theo ID và hiển thị form chỉnh sửa
        $danhmucs = DanhMuc::withTrashed()->findOrFail($id);
        return view('admins.danhmucs.update', compact('danhmucs'));
    }

    public function update(Request $request, string $id)
    {
        // Lấy danh mục theo ID
        $danhmucs = DanhMuc::withTrashed()->findOrFail($id);

        // Validate dữ liệu đầu vào, bỏ qua bản ghi hiện tại khi kiểm tra tính duy nhất
        $validatedData = $request->validate(
            [
                'ten_danh_muc' => 'required|string|max:255|unique:danh_mucs,ten_danh_muc',
                'mo_ta' => 'nullable|string',
                'anh_danh_muc' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'ten_danh_muc.required' => 'Tên danh mục không được để trống',
                'ten_danh_muc.string' => 'Tên danh mục phải là chuỗi',
                'ten_danh_mucunique' => 'Tên danh mục đã tồn tại',
                'ten_danh_muc.max' => 'Tên danh mục không quá 255 ký tự',

                'anh_danh_muc.image' => 'Ảnh danh mục phải là ảnh',
                'anh_danh_muc.mimes' => 'Ảnh danh mục phải có đuôi jpg, png, jpeg, gif',
            ]
        );

        // Lưu ảnh mới nếu có
        if ($request->hasFile('anh_danh_muc')) {

            // Xóa ảnh cũ nếu có
            if ($danhmucs->anh_danh_muc) {
                Storage::disk('public')->delete($danhmucs->anh_danh_muc);
            }

            $fileName = time() . '_' .  $request->file('anh_danh_muc')->getClientOriginalName();
            $filePath = $request->file('anh_danh_muc')->storeAs('danhmucs', $fileName, 'public');
            $validatedData['anh_danh_muc'] = 'storage/' . $filePath;
        }

        // Cập nhật danh mục
        $danhmucs->update($validatedData);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admin.danhmucs.index')->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy(string $id)
    {
        // Lấy danh mục theo ID
        $danhMuc = DanhMuc::withTrashed()->findOrFail($id);

        // Xóa danh mục
        if ($danhMuc->anh_danh_muc) {
            // Xóa ảnh từ storage
            Storage::disk('public')->delete($danhMuc->anh_danh_muc);
        }

        // Xóa bản ghi danh mục
        $danhMuc->delete();

        // Chuyển hướng và thông báo thành công
        return back()->with('success', 'Xóa danh mục thành công!');
    }
    // Xóa mềm
    public function softDelete($id)
    {
        $danhMuc = DanhMuc::find($id);
        if ($danhMuc) {
            // $sanPhamDanhMucs = $danhMuc->sanPhams()->withTrashed()->get();
            // if (count($sanPhamDanhMucs) > 0) {
            //     return redirect()->back()->with('error', 'Danh mục vẫn còn sản phẩm, không thể ngừng hoạt động.');
            // }
            $danhMuc->delete();
            return redirect()->back()->with('success', 'Xóa mềm thành công.');
        }
        return redirect()->back()->with('error', 'Không tìm thấy dữ liệu.');
    }

    public function restore($id)
    {
        $danhMuc = DanhMuc::withTrashed()->find($id);
        if ($danhMuc) {
            $danhMuc->restore();
            return redirect()->back()->with('success', 'Khôi phục thành công.');
        }
        return redirect()->back()->with('error', 'Không tìm thấy dữ liệu.');
    }
}

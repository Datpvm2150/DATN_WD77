<?php

namespace App\Http\Controllers\Client;

use App\Models\DanhMuc;
use App\Models\lien_hes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LienHeController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::all(); // Lấy toàn bộ danh mục sản phẩm
        return view('clients.lienhe', compact('danhMucs'));
    }


    public function store(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        // if (!auth()->check()) {
        //     return redirect()->route('login')->with('error', 'Vui lòng đăng nhập trước khi gửi form.');
        // }

        // Xác thực dữ liệu đầu vào
        $validateData = $request->validate(
            [
                'ten_nguoi_gui' => 'required|max:255|string',
                'tin_nhan' => 'nullable|string',
            ],
            [
                'ten_nguoi_gui.required' => 'Vui lòng nhập tên người gửi.',
                'ten_nguoi_gui.max' => 'Tên người gửi không được vượt quá 255 ký tự.',
                'ten_nguoi_gui.string' => 'Tên người gửi phải là một chuỗi văn bản.',
                'tin_nhan.string' => 'Tin nhắn phải là một chuỗi văn bản.',
                'tin_nhan.nullable' => 'Tin nhắn có thể để trống.',
            ]
        );

        $ten_nguoi_gui = $request->input('ten_nguoi_gui');
        $tin_nhan = $request->input('tin_nhan', '');
        $userID = Auth::user()->id;

        // Tạo mới một bản ghi trong bảng lien_hes
        lien_hes::create([
            'ten_nguoi_gui' => $ten_nguoi_gui,
            'tin_nhan' => $tin_nhan,
            'user_id' => $userID,
        ]);

        // Gửi email thông báo cho quản trị viên
        return response()->json(['success' => 'Tin nhắn đã được gửi thành công.']);
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Models\DanhMuc;
use App\Models\lien_hes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LienHeController extends Controller
{
    public function index()
    {
        $danhMucs = DanhMuc::all();
        return view('clients.lienhe', compact('danhMucs'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Vui lòng đăng nhập trước khi gửi form.'], 401);
        }

        $validatedData = $request->validate([
            'ten_nguoi_gui' => 'required|string|max:255',
            'tin_nhan' => 'nullable|string',
        ], [
            'ten_nguoi_gui.required' => 'Tên người gửi không được để trống',
            'ten_nguoi_gui.string' => 'Tên người gửi phải là chuỗi',
            'ten_nguoi_gui.max' => 'Tên người gửi không quá 255 ký tự',
            'tin_nhan.nullable' => 'Tin nhắn có thể bỏ trống',
            'tin_nhan.string' => 'Tin nhắn phải là chuỗi',
        ]);

        $userId = Auth::user()->id;
        $ten_nguoi_gui = $request->input('ten_nguoi_gui');
        $tin_nhan = $request->input('tin_nhan');

        // Kiểm tra tin nhắn trùng lặp trong 1 phút gần đây
        $recentMessage = lien_hes::where('user_id', $userId)
            ->where('ten_nguoi_gui', $ten_nguoi_gui)
            ->where('tin_nhan', $tin_nhan)
            ->where('created_at', '>=', now()->subMinutes(1))
            ->exists();

        if ($recentMessage) {
            return response()->json(['error' => 'Bạn đã gửi tin nhắn này gần đây. Vui lòng thử lại sau.'], 429);
        }

        // Lưu vào cơ sở dữ liệu
        lien_hes::create([
            'user_id' => $userId,
            'ten_nguoi_gui' => $ten_nguoi_gui,
            'tin_nhan' => $tin_nhan,
            'trang_thai_phan_hoi' => lien_hes::STATUS_PENDING,
        ]);

        // Trả về thông báo thành công
        return response()->json(['success' => 'Tin nhắn của bạn đã được gửi']);
    }
}

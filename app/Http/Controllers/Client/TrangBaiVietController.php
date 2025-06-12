<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class TrangBaiVietController extends Controller
{
   public function index(Request $request) {
     // Lấy tất cả danh mục
    $danhMucs = DanhMuc::withCount('baiViets')->get();

    // Lấy danh mục được chọn từ  yêu cầu
    $danhMucId = $request->input('danh_muc');

    // Lấy tất cả các bài viết đã được duyệt và lọc theo danh mục nếu có
    $baiVietQuery = BaiViet::where('trang_thai', true);

    // Nêu có danh mục được chọn, thêm điều kiện lọc theo danh mục
    if ($danhMucId) {
        $baiVietQuery->where('danh_muc_id', $danhMucId);
    }

    // Kiểm tra nếu có từ khóa tìm kiếm không
    if($request->filled('search')) {
        $baiVietQuery->where('tieu_de', 'like', '%' . $request->input('search') . '%')
                     ->orWhere('noi_dung', 'like', '%' . $request->input('search') . '%');
    }

    // Phân trang
    $baiVietQuery->orderBy('created_at', 'desc')->paginate(6);

    // Lấy thông tin người dùng đã đăng nhập
    $user = auth()->user();
    
     // Lấy các bài viết mới nhất (giả sử 5 bài mới nhất)
    $latestPosts = BaiViet::where('trang_thai', true)->orderBy('created_at', 'desc')->take(5)->get();

    // Trả về view với các biến cần thiết
    return view('clients.baiviet', compact('baiViet', 'user', 'latestPosts', 'danhMucs'));
   }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDon;
use App\Models\DanhMuc;
use App\Models\HoaDon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaiKhoanController extends Controller
{
    public function index() {
        // Lấy thông tin người đăng nhập
        $user = Auth::user(); // Lấy người dùng hiện tại

        // Lấy danh mục
        $danhMucs = DanhMuc::get();
        // Lấy thông tin hóa đơn của người đăng nhập
        $donHangs = $user->hoaDons()->get();
        // dd($donHangs);
        // Lấy trạng trạng thái hóa đơn
        $trang_thai_don_hang = HoaDon::TRANG_THAI;
        return view('clients.taikhoan.donhang',compact('danhMucs','donHangs','trang_thai_don_hang'));
    }

    public function show(string $id) {
        $hoaDon = HoaDon::findOrFail($id);

        // Lấy thông tin chi tiết sản phẩm theo hóa đơn cùng với biến thể sản phẩm và sản phẩm
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();
        $danhMucs = DanhMuc::all();
        // Lấy các thuộc tính của hóa đơn
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        return view('clients.taikhoan.chitietdonhang', compact('trangThaiThanhToan','hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan', 'danhMucs'));

    }

    public function cancelOrder($id, Request $request) {
        $orders = HoaDon::findOrFail($id);

        if(!$orders) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại');
        }

        // Lấy chi tiết hóa đơn theo hóa đơn 
        $chiTietHoaDons = ChiTietHoaDon::where('hoa_don_id', $orders->id)->get();

        // Cập nhật số lượng sản phẩm trong kho
        foreach($chiTietHoaDons as $chiTiet) {
            $bienThe = $chiTiet->bienTheSanPham;
            if($bienThe) {
                $bienThe->so_luong += $chiTiet->so_luong;
                $bienThe->save();
            }
        }

        // Cập nhật trạng thái đơn hàng
        $orders->trang_thai = 6; // hủy đơn

        if ($orders->save()) {
            return redirect()->back()->with('success', 'Đã hủy đơn hàng thành công!');
        } else {
            return redirect()->back()->with('error', 'Đã có lỗi khi hủy!');
        }
    }

    public function getOrder($id, Request $request)
{
    // Tìm đơn hàng theo ID
    $orders = HoaDon::findOrFail($id);

    // Kiểm tra trạng thái đơn hàng có phải là 5 (Đã giao) không
    if ($orders->trang_thai != 5) {
        return redirect()->back()->with('error', 'Chỉ có thể xác nhận nhận hàng khi đơn hàng ở trạng thái "Đã giao".');
    }

    // Cập nhật trạng thái đơn hàng sang 7 (Đã nhận hàng)
    $orders->trang_thai = 7;
    $orders->trang_thai_thanh_toan = 'Đã thanh toán';

    // Lưu lại trạng thái đơn hàng
    if ($orders->save()) {
        return redirect()->back()->with('success', 'Đã nhận được hàng. Cảm ơn bạn!');
    } else {
        return redirect()->back()->with('error', 'Đã có lỗi khi xác nhận nhận hàng!');
    }
}
    public function filterOrders(Request $request) {
        $status = $request->get('status');

        // Lấy Id người dùng đăng nhập
        $userId = auth()->id();
        // Lấy đơn hàng theo người dùng
        $donHangs = HoaDon::where('user_id', $userId);

        // Gộp trạng thái
        if($status == 1) {
        $donHangs = $donHangs->where('trang_thai', 1); // Chờ xác nhận
        } elseif ($status == 2) {
        $donHangs = $donHangs->whereIn('trang_thai', [2, 3]); // Chờ lấy hàng
        } elseif ($status == 4) {
            $donHangs = $donHangs->whereIn('trang_thai', [4, 5]); // Đang giao
        }elseif ($status == 5) {
            $donHangs = $donHangs->where('trang_thai', 7); // Đã giao
        }elseif ($status == 6) {
            $donHangs = $donHangs->where('trang_thai', 6); // Đã hủy
        }

        $donHangs = $donHangs->get();

          // Đếm số lượng theo từng trạng thái
    $counts = [
        1 => HoaDon::where('user_id', $userId)->where('trang_thai', 1)->count(), // Chờ xác nhận
        2 => HoaDon::where('user_id', $userId)->whereIn('trang_thai', [2, 3])->count(), // Chờ lấy hàng
        4 => HoaDon::where('user_id', $userId)->whereIn('trang_thai', [4, 5])->count(), // Đang giao
        5 => HoaDon::where('user_id', $userId)->where('trang_thai', 7)->count(), // Đã giao
        6 => HoaDon::where('user_id', $userId)->where('trang_thai', 6)->count(), // Đã hủy
    ];

    // Trả về view partial cho AJAX
    return response()->json([
        'html' => view('clients.taikhoan.list', compact('donHangs'))->render(),
        'counts' => $counts,
    ]);
    }
}

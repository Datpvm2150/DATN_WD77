<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Log;

class HoaDonController extends Controller
{
    public function index(Request $request)
    {
        $title = "Danh sách đơn hàng";

        // Lấy tham số từ request
        $ngayBatDau = $request->input('ngay_bat_dau');
        $ngayKetThuc = $request->input('ngay_ket_thuc');
        $phuongThucThanhToan = $request->input('phuong_thuc_thanh_toan');
        $trangThaiThanhToan = $request->input('trang_thai_thanh_toan');
        $trangThai = $request->input('trang_thai');
        $maDonHang = $request->input('ma_don_hang');

        $query = HoaDon::query();

        // Áp dụng lọc theo ngày tháng
        if ($ngayBatDau) {
            $query->whereDate('ngay_dat_hang', '>=', $ngayBatDau);
        }

        if ($ngayKetThuc) {
            $query->whereDate('ngay_dat_hang', '<=', $ngayKetThuc);
        }

        // Áp dụng lọc theo phương thức thanh toán
        if ($phuongThucThanhToan) {
            $query->where('phuong_thuc_thanh_toan', $phuongThucThanhToan);
        }

        if ($trangThaiThanhToan) {
            $query->where('trang_thai_thanh_toan', $trangThaiThanhToan);
        }

        // Áp dụng lọc theo trạng thái
        if ($trangThai) {
            $query->where('trang_thai', $trangThai);
        }

        // Áp dụng lọc theo mã đơn hàng
        if ($maDonHang) {
            $query->where('ma_hoa_don', 'LIKE', "%$maDonHang%");
        }

        // Lấy danh sách hóa đơn
        $listHoaDon = $query->orderByRaw(
            "CASE WHEN trang_thai = ? THEN 0 ELSE 1 END",
            [HoaDon::CHO_XAC_NHAN]
        )
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $type_huy_don_hang = HoaDon::HUY_DON_HANG;
        $type_da_nhan_hang = HoaDon::DA_NHAN_HANG;

        return view('admins.hoadons.index', compact('title', 'listHoaDon', 'trangThaiHoaDon', 'type_huy_don_hang', 'type_da_nhan_hang'));
    }

    public function show(string $id)
    {
        $title = "Thông tin chi tiết đơn hàng";

        // Lấy hóa đơn theo ID
        $hoaDon = HoaDon::query()->findOrFail($id);

        // Lấy thông tin chi tiết sản phẩm theo hóa đơn cùng với biến thể sản phẩm và sản phẩm
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();

        // Tính tổng thành tiền của các sản phẩm
        $tongThanhTien = $chiTietHoaDons->sum('thanh_tien');

        // Tiền ship cố định
        $tienShip = 50000;

        // Giảm giá
        $giamGia = $hoaDon->giam_gia ?? 0;

        // Tổng tiền cuối cùng sau khi thêm tiền ship và giảm giá
        $tongTienCuoi = $tongThanhTien + $tienShip - $giamGia;


        // Các thuộc tính khác của hóa đơn
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        return view('admins.hoadons.show', compact('title', 'hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan', 'trangThaiThanhToan', 'tongThanhTien', 'tienShip', 'giamGia', 'tongTienCuoi'));
    }

    public function update(Request $request, $id)
    {
        $hoadon = HoaDon::findOrFail($id);

        // Kiểm tra nếu trạng thái hiện tại là "Đơn hàng đã hủy" hoặc "Đã nhận được hàng"
        if (in_array($hoadon->trang_thai, [6, 7])) {
            return redirect()->back()->with('error', 'Không thể cập nhật trạng thái vì đơn hàng đã hủy hoặc đã nhận.');
        }

        // Kiểm tra trạng thái đơn hàng hiện tại để không cho phép cập nhật ngược lại
        if ($hoadon->trang_thai == '6' || $hoadon->trang_thai == '7') {
            // Nếu trạng thái là "Đơn hàng đã hủy" hoặc "Đã nhận được hàng", chỉ cho phép thay đổi trạng thái thanh toán
            if ($request->has('trang_thai_thanh_toan')) {
                $hoadon->trang_thai_thanh_toan = $request->input('trang_thai_thanh_toan');
                $hoadon->save();
                return redirect()->route('admin.hoadons.index')->with('success', 'Cập nhật trạng thái thanh toán thành công!');
            }
            // Nếu không thay đổi gì cả
            return redirect()->route('admin.hoadons.index')->with('info', 'Không thể thay đổi trạng thái đơn hàng nữa!');
        }

        // Kiểm tra nếu phương thức thanh toán là "Trả tiền mặt"
        if ($hoadon->phuong_thuc_thanh_toan === 'Thanh toán khi nhận hàng') {
            if ($request->has('trang_thai_thanh_toan') && $request->input('trang_thai_thanh_toan') === 'Đã thanh toán') {
                // Chỉ cho phép nếu trạng thái đơn hàng là "Đã giao"
                if ($hoadon->trang_thai !== 5) { // 5: Đã giao
                    return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể chuyển trạng thái thanh toán thành "Đã thanh toán" khi đơn hàng đã được giao.');
                }
            }
        }

        // Kiểm tra phương thức thanh toán là chuyển khoản và trạng thái thanh toán là "chưa thanh toán"
        if ($hoadon->phuong_thuc_thanh_toan == 'Thanh toán qua chuyển khoản ngân hàng' && $hoadon->trang_thai_thanh_toan == 'Chưa thanh toán') {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể cập nhật trạng thái đơn hàng khi phương thức thanh toán là chuyển khoản và chưa thanh toán!');
        }

        // Chỉ cho phép thay đổi trạng thái nếu trạng thái hiện tại chưa qua bước cuối (Đang vận chuyển, Đã giao hàng)
        $validStatesForUpdate = ['1', '2', '3', '4', '5'];  // Các trạng thái có thể thay đổi
        if (!in_array($hoadon->trang_thai, $validStatesForUpdate)) {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể thay đổi trạng thái đơn hàng này!');
        }

        // Cập nhật trạng thái đơn hàng nếu hợp lệ
        if ($request->has('trang_thai') && $hoadon->trang_thai != $request->input('trang_thai')) {
            // Kiểm tra trạng thái mới
            $newState = $request->input('trang_thai');
            if ($hoadon->trang_thai < 5) {
                // Đối với trạng thái 1-4, chỉ cho phép chuyển sang trạng thái kế tiếp
                $nextState = (string) ((int) $hoadon->trang_thai + 1);
                if ($newState != $nextState) {
                    return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể chuyển sang trạng thái kế tiếp!');
                }
            } elseif ($hoadon->trang_thai == 5) {
                // Đối với trạng thái 5, chỉ cho phép chuyển sang 6 hoặc 7
                if (!in_array($newState, ['6', '7'])) {
                    return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể chuyển sang trạng thái "Đơn hàng đã hủy" hoặc "Đã nhận được hàng"!');
                }
            }
            $hoadon->trang_thai = $newState;
        }

        // Cập nhật trạng thái thanh toán nếu có
        if ($request->has('trang_thai_thanh_toan') && $hoadon->trang_thai_thanh_toan != $request->input('trang_thai_thanh_toan')) {
            $hoadon->trang_thai_thanh_toan = $request->input('trang_thai_thanh_toan');
        }

        $hoadon->save();

        return redirect()->route('admin.hoadons.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function destroy(string $id)
    {
        $hoaDon = HoaDon::findOrFail($id);

        // Kiểm tra nếu đơn hàng chưa thanh toán
        if ($hoaDon->trang_thai_thanh_toan !== 'Chưa thanh toán') {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể hủy đơn hàng vì đơn hàng đã được thanh toán.');
        }

        // Cập nhật trạng thái "Đã hủy"
        $hoaDon->trang_thai = 6;
        $hoaDon->save();

        return redirect()->route('admin.hoadons.index')->with('success', 'Đơn hàng đã được hủy thành công.');
    }
}
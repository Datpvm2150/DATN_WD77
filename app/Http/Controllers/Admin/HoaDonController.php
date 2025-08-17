<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Services\OrderService;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Log;

class HoaDonController extends Controller
{
    public function index(Request $request)
    {
        $title = "Danh sách đơn hàng";
        $ngayBatDau = $request->input('ngay_bat_dau');
        $ngayKetThuc = $request->input('ngay_ket_thuc');
        $phuongThucThanhToan = $request->input('phuong_thuc_thanh_toan');
        $trangThaiThanhToan = $request->input('trang_thai_thanh_toan');
        $trangThai = $request->input('trang_thai');
        $maDonHang = $request->input('ma_don_hang');

        $query = HoaDon::query();

        if ($ngayBatDau) {
            $query->whereDate('ngay_dat_hang', '>=', $ngayBatDau);
        }

        if ($ngayKetThuc) {
            $query->whereDate('ngay_dat_hang', '<=', $ngayKetThuc);
        }

        if ($phuongThucThanhToan) {
            $query->where('phuong_thuc_thanh_toan', $phuongThucThanhToan);
        }

        if ($trangThaiThanhToan) {
            $query->where('trang_thai_thanh_toan', $trangThaiThanhToan);
        }

        if ($trangThai) {
            $query->where('trang_thai', $trangThai);
        }

        if ($maDonHang) {
            $query->where('ma_hoa_don', 'LIKE', "%$maDonHang%");
        }

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
        $hoaDon = HoaDon::query()->findOrFail($id);
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();
        $tongThanhTien = $chiTietHoaDons->sum('thanh_tien');
        $tienShip = 50000;
        $giamGia = $hoaDon->giam_gia ?? 0;
        $tongTienCuoi = $tongThanhTien + $tienShip - $giamGia;
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        return view('admins.hoadons.show', compact('title', 'hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan', 'trangThaiThanhToan', 'tongThanhTien', 'tienShip', 'giamGia', 'tongTienCuoi'));
    }

    public function update(Request $request, $id)
    {
        $hoadon = HoaDon::findOrFail($id);

        if (in_array($hoadon->trang_thai, [6, 7])) {
            return redirect()->back()->with('error', 'Không thể cập nhật trạng thái vì đơn hàng đã hủy hoặc đã nhận.');
        }

        if ($hoadon->trang_thai == '6' || $hoadon->trang_thai == '7') {
            if ($request->has('trang_thai_thanh_toan')) {
                $hoadon->trang_thai_thanh_toan = $request->input('trang_thai_thanh_toan');
                $hoadon->save();
                return redirect()->route('admin.hoadons.index')->with('success', 'Cập nhật trạng thái thanh toán thành công!');
            }
            return redirect()->route('admin.hoadons.index')->with('info', 'Không thể thay đổi trạng thái đơn hàng nữa!');
        }

        if ($hoadon->phuong_thuc_thanh_toan === 'Thanh toán khi nhận hàng') {
            if ($request->has('trang_thai_thanh_toan') && $request->input('trang_thai_thanh_toan') === 'Đã thanh toán') {
                if ($hoadon->trang_thai !== 5) {
                    return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể chuyển trạng thái thanh toán thành "Đã thanh toán" khi đơn hàng đã được giao.');
                }
            }
        }

        if ($hoadon->phuong_thuc_thanh_toan === 'Thanh toán qua chuyển khoản ngân hàng') {
            if ($request->has('trang_thai') && $hoadon->trang_thai != $request->input('trang_thai')) {
                if ($hoadon->trang_thai_thanh_toan !== 'Đã thanh toán') {
                    return redirect()->route('admin.hoadons.index')
                        ->with('error', 'Đối với đơn hàng chuyển khoản, chỉ có thể cập nhật trạng thái đơn hàng khi đã thanh toán thành công!');
                }
            }
        }

        $validStatesForUpdate = ['1', '2', '3', '4', '5'];
        if (!in_array($hoadon->trang_thai, $validStatesForUpdate)) {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể thay đổi trạng thái đơn hàng này!');
        }

        if ($request->has('trang_thai') && $hoadon->trang_thai != $request->input('trang_thai')) {
            $newState = $request->input('trang_thai');
            if ($hoadon->trang_thai < 5) {
                $nextState = (string) ((int) $hoadon->trang_thai + 1);
                if ($newState != $nextState) {
                    return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể chuyển sang trạng thái kế tiếp!');
                }
            } elseif ($hoadon->trang_thai == 5) {
                if (!in_array($newState, ['6', '7'])) {
                    return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể chuyển sang trạng thái "Đơn hàng đã hủy" hoặc "Đã nhận được hàng"!');
                }
            }
            $hoadon->trang_thai = $newState;

            //Nếu trạng thái mới là "Đã giao hàng" thì tự động cập nhật thanh toán
            if ($newState == '5') {
                $hoadon->trang_thai_thanh_toan = 'Đã thanh toán';
                $hoadon->thoi_gian_giao_dich = now();

                try {
                    $orderService = app(OrderService::class);
                    $orderService->updatePaymentStatus($hoadon->id);
                    $orderService->sendVoucherAfterPaid($hoadon);
                } catch (\Exception $e) {
                    Log::error("Lỗi khi gửi mã giảm giá sau thanh toán: " . $e->getMessage());
                }
            }
        }

        if ($request->has('trang_thai_thanh_toan') && $hoadon->trang_thai_thanh_toan != $request->input('trang_thai_thanh_toan')) {
            $hoadon->trang_thai_thanh_toan = $request->input('trang_thai_thanh_toan');
            if ($request->input('trang_thai_thanh_toan') === 'Đã thanh toán') {
                $hoadon->thoi_gian_giao_dich = now();
                try {
                    $orderService = app(OrderService::class);
                    $orderService->updatePaymentStatus($hoadon->id);
                    $orderService->sendVoucherAfterPaid($hoadon);
                } catch (\Exception $e) {
                    Log::error("Lỗi khi gửi mã giảm giá sau thanh toán: " . $e->getMessage());
                }
            }
        }

        $hoadon->save();

        return redirect()->route('admin.hoadons.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function destroy(Request $request, string $id)
    {
        $hoaDon = HoaDon::findOrFail($id);

        // Kiểm tra nếu đơn hàng chưa thanh toán
        if ($hoaDon->trang_thai_thanh_toan !== 'Chưa thanh toán') {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể hủy đơn hàng vì đơn hàng đã được thanh toán.');
        }

        // Kiểm tra nếu trạng thái không phải Đã xác nhận (2) hoặc Đang chuẩn bị (3)
        if (!in_array($hoaDon->trang_thai, [2, 3])) {
            return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể hủy đơn hàng ở trạng thái Đã xác nhận hoặc Đang chuẩn bị.');
        }

        // Lưu lý do hủy
        $hoaDon->trang_thai = 6;
        $hoaDon->ly_do_huy = $request->input('ly_do_huy');
        $hoaDon->save();

        return redirect()->route('admin.hoadons.index')->with('success', 'Đơn hàng đã được hủy thành công.');
    }
}
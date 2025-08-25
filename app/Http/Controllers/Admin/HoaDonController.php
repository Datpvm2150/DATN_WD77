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
    // Hiển thị danh sách đơn hàng
    public function index(Request $request)
    {
        // Đặt tiêu đề cho trang
        $title = "Danh sách đơn hàng";

        // Lấy các tham số lọc từ request
        $ngayBatDau = $request->input('ngay_bat_dau');
        $ngayKetThuc = $request->input('ngay_ket_thuc');
        $phuongThucThanhToan = $request->input('phuong_thuc_thanh_toan');
        $trangThaiThanhToan = $request->input('trang_thai_thanh_toan');
        $trangThai = $request->input('trang_thai');
        $maDonHang = $request->input('ma_don_hang');

        // Tạo query để lấy danh sách đơn hàng
        $query = HoaDon::query();

        // Lọc theo ngày bắt đầu
        if ($ngayBatDau) {
            $query->whereDate('ngay_dat_hang', '>=', $ngayBatDau);
        }

        // Lọc theo ngày kết thúc
        if ($ngayKetThuc) {
            $query->whereDate('ngay_dat_hang', '<=', $ngayKetThuc);
        }

        // Lọc theo phương thức thanh toán
        if ($phuongThucThanhToan) {
            $query->where('phuong_thuc_thanh_toan', $phuongThucThanhToan);
        }

        // Lọc theo trạng thái thanh toán
        if ($trangThaiThanhToan) {
            $query->where('trang_thai_thanh_toan', $trangThaiThanhToan);
        }

        // Lọc theo trạng thái đơn hàng
        if ($trangThai) {
            $query->where('trang_thai', $trangThai);
        }

        // Lọc theo mã đơn hàng
        if ($maDonHang) {
            $query->where('ma_hoa_don', 'LIKE', "%$maDonHang%");
        }

        // Sắp xếp đơn hàng theo thời gian tạo giảm dần và phân trang (9 đơn hàng/trang)
        $listHoaDon = $query->orderBy('created_at', 'desc')
            ->paginate(9);

        // Lấy danh sách trạng thái đơn hàng từ model
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $type_huy_don_hang = HoaDon::HUY_DON_HANG;
        $type_da_nhan_hang = HoaDon::DA_NHAN_HANG;

        // Trả về view với dữ liệu cần thiết
        return view('admins.hoadons.index', compact('title', 'listHoaDon', 'trangThaiHoaDon', 'type_huy_don_hang', 'type_da_nhan_hang'));
    }

    // Hiển thị chi tiết đơn hàng
    public function show(string $id)
    {
        // Đặt tiêu đề cho trang
        $title = "Thông tin chi tiết đơn hàng";

        // Tìm đơn hàng theo ID, ném lỗi nếu không tìm thấy
        $hoaDon = HoaDon::query()->findOrFail($id);

        // Lấy chi tiết đơn hàng cùng với thông tin sản phẩm
        $chiTietHoaDons = $hoaDon->chiTietHoaDons()->with(['bienTheSanPham.sanPham'])->get();

        // Tính tổng thành tiền
        $tongThanhTien = $chiTietHoaDons->sum('thanh_tien');

        // Phí vận chuyển cố định
        $tienShip = 50000;

        // Giảm giá (nếu có)
        $giamGia = $hoaDon->giam_gia ?? 0;

        // Tính tổng tiền cuối cùng
        $tongTienCuoi = $tongThanhTien + $tienShip - $giamGia;

        // Lấy danh sách trạng thái và phương thức thanh toán từ model
        $trangThaiHoaDon = HoaDon::TRANG_THAI;
        $phuongThucThanhToan = HoaDon::PHUONG_THUC_THANH_TOAN;
        $trangThaiThanhToan = HoaDon::TRANG_THAI_THANH_TOAN;

        // Trả về view chi tiết đơn hàng
        return view('admins.hoadons.show', compact('title', 'hoaDon', 'chiTietHoaDons', 'trangThaiHoaDon', 'phuongThucThanhToan', 'trangThaiThanhToan', 'tongThanhTien', 'tienShip', 'giamGia', 'tongTienCuoi'));
    }

    // Cập nhật trạng thái đơn hàng hoặc trạng thái thanh toán
    public function update(Request $request, $id)
    {
        // Tìm đơn hàng theo ID
        $hoadon = HoaDon::findOrFail($id);

        // Kiểm tra nếu đơn hàng ở trạng thái đã hủy hoặc đã nhận
        if (in_array($hoadon->trang_thai, [6, 7])) {
            return redirect()->back()->with('error', 'Không thể cập nhật trạng thái vì đơn hàng đã hủy hoặc đã nhận.');
        }

        // Xử lý đơn hàng thanh toán qua chuyển khoản ngân hàng
        if ($hoadon->phuong_thuc_thanh_toan === 'Thanh toán qua chuyển khoản ngân hàng') {
            // Đảm bảo trạng thái thanh toán là "Đã thanh toán"
            if ($request->has('trang_thai_thanh_toan') && $request->input('trang_thai_thanh_toan') !== 'Đã thanh toán') {
                return redirect()->route('admin.hoadons.index')->with('error', 'Đơn hàng thanh toán qua chuyển khoản ngân hàng chỉ có thể có trạng thái thanh toán là "Đã thanh toán".');
            }
            // Tự động đặt trạng thái thanh toán thành "Đã thanh toán" nếu chưa được đặt
            if ($hoadon->trang_thai_thanh_toan !== 'Đã thanh toán') {
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

        // Xử lý đơn hàng thanh toán khi nhận hàng (COD)
        if ($hoadon->phuong_thuc_thanh_toan === 'Thanh toán khi nhận hàng') {
            if ($request->has('trang_thai_thanh_toan') && $request->input('trang_thai_thanh_toan') === 'Đã thanh toán') {
                if ($hoadon->trang_thai !== 5) {
                    return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể chuyển trạng thái thanh toán thành "Đã thanh toán" khi đơn hàng đã được giao.');
                }
            }
        }

        // Danh sách trạng thái hợp lệ để cập nhật
        $validStatesForUpdate = ['1', '2', '3', '4', '5'];
        if (!in_array($hoadon->trang_thai, $validStatesForUpdate)) {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể thay đổi trạng thái đơn hàng này!');
        }

        // Cập nhật trạng thái đơn hàng
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
            // Nếu trạng thái đơn hàng là "Đã thanh toán" thì set luôn trạng thái thanh toán
            if ($newState == 5) {

                $hoadon->trang_thai_thanh_toan = 'Đã thanh toán';
                $hoadon->thoi_gian_giao_dich = now();

                try {
                    $orderService = app(OrderService::class);
                    $orderService->updatePaymentStatus($hoadon->id);
                    $orderService->sendVoucherAfterPaid($hoadon);
                    // Cộng số lượng đã bán cho sản phẩm
                    foreach ($hoadon->chiTietHoaDons as $chiTiet) {
                        $bienThe = $chiTiet->bienTheSanPham;
                        if ($bienThe && $bienThe->sanPham) {
                            $bienThe->sanPham->increment('da_ban', $chiTiet->so_luong);
                        }
                    }
                } catch (\Exception $e) {
                    Log::error("Lỗi khi xử lý sau thanh toán: " . $e->getMessage());
                }
            } else {
                if ($request->filled('trang_thai_thanh_toan')) {
                    $hoadon->trang_thai_thanh_toan = $request->input('trang_thai_thanh_toan');
                }
            }
        }



        if ($request->has('trang_thai_thanh_toan') && $hoadon->trang_thai_thanh_toan != $request->input('trang_thai_thanh_toan')) {
            $hoadon->trang_thai_thanh_toan = $request->input('trang_thai_thanh_toan');
            if ($request->input('trang_thai_thanh_toan') === 'Đã thanh toán') {
                $hoadon->thoi_gian_giao_dich = now(); // cập nhật thời gian thanh toán
                try {
                    $orderService = app(OrderService::class);
                    $orderService->updatePaymentStatus($hoadon->id); // Cập nhật mã đã dùng
                    $orderService->sendVoucherAfterPaid($hoadon); // Gửi mã nếu đủ điều kiện
                } catch (\Exception $e) {
                    Log::error("Lỗi khi gửi mã giảm giá sau thanh toán: " . $e->getMessage());
                }
            }
        }

        // Lưu các thay đổi vào cơ sở dữ liệu
        $hoadon->save();

        // Chuyển hướng về danh sách đơn hàng với thông báo thành công
        return redirect()->route('admin.hoadons.index')->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    // Hủy đơn hàng
    public function destroy(Request $request, string $id)
    {
        // Tìm đơn hàng theo ID
        $hoaDon = HoaDon::findOrFail($id);

        // Kiểm tra nếu đơn hàng đã thanh toán
        if ($hoaDon->trang_thai_thanh_toan !== 'Chưa thanh toán') {
            return redirect()->route('admin.hoadons.index')->with('error', 'Không thể hủy đơn hàng vì đơn hàng đã được thanh toán.');
        }

        // Kiểm tra nếu trạng thái không phải Đã xác nhận (2) hoặc Đang chuẩn bị (3)
        if (!in_array($hoaDon->trang_thai, [2, 3])) {
            return redirect()->route('admin.hoadons.index')->with('error', 'Chỉ có thể hủy đơn hàng ở trạng thái Đã xác nhận hoặc Đang chuẩn bị.');
        }

        // Cập nhật trạng thái thành đã hủy và lưu lý do hủy
        $hoaDon->trang_thai = 6;
        $hoaDon->ly_do_huy = $request->input('ly_do_huy');
        $hoaDon->save();

        // Chuyển hướng về danh sách đơn hàng với thông báo thành công
        return redirect()->route('admin.hoadons.index')->with('success', 'Đơn hàng đã được hủy thành công.');
    }
}

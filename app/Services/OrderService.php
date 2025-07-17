<?php

namespace App\Services;

use App\Models\HoaDon;
use App\Models\KhuyenMai;
use App\Mail\InvoiceCreated;
use App\Mail\MaGiamGiaMoi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderService
{
    public function sendVoucherAfterPaid(HoaDon $hoaDon)
    {
        if ($hoaDon->tong_tien < 1000000) return;

        $ma = Str::upper(Str::random(8));

        $voucher = KhuyenMai::create([
            'ma_khuyen_mai' => $ma,
            'phan_tram_khuyen_mai' => 5,
            'giam_toi_da' => 50000,
            'ngay_bat_dau' => now(),
            'ngay_ket_thuc' => now()->addDays(7),
            'trang_thai' => true,
            'so_luong' => 1,
            'da_su_dung' => 0,
            'user_id' => $hoaDon->user_id,
            'loai_ma' => 'ca_nhan',
        ]);

        Mail::to($hoaDon->email)->send(new MaGiamGiaMoi($ma, $voucher));
    }

    public function updatePaymentStatus($orderId)
    {
        $hoaDon = HoaDon::findOrFail($orderId);

        if ($hoaDon->trang_thai_thanh_toan !== HoaDon::TRANG_THAI_THANH_TOAN['Đã thanh toán']) {
            $hoaDon->trang_thai_thanh_toan = HoaDon::TRANG_THAI_THANH_TOAN['Đã thanh toán'];
            $hoaDon->thoi_gian_giao_dich = now();

            // Cập nhật trạng thái đơn nếu bạn có thêm logic quản lý trạng thái đơn ngoài thanh toán
            $hoaDon->trang_thai = 'Đã thanh toán';
            $hoaDon->save();

            // Nếu có mã khuyến mãi, xử lý tăng số lần sử dụng nếu là mã cá nhân
            if ($hoaDon->ma_khuyen_mai) {
                $discount = KhuyenMai::where('ma_khuyen_mai', $hoaDon->ma_khuyen_mai)->first();
                if ($discount && $discount->loai_ma === 'ca_nhan') {
                    $discount->increment('da_su_dung');
                }
            }

            // Tặng mã sau khi đã cập nhật trạng thái
            $this->sendVoucherAfterPaid($hoaDon);

            // Gửi email xác nhận thanh toán thành công
            try {
                Mail::to($hoaDon->email)->send(new InvoiceCreated($hoaDon));
            } catch (\Exception $e) {
                Log::error("Không thể gửi email: " . $e->getMessage());
            }

            return back()->with('success', 'Cập nhật trạng thái thanh toán thành công.');
        }

        return back()->with('info', 'Đơn hàng đã được thanh toán trước đó.');
    }
}

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
        $tongTien = $hoaDon->tong_tien;
        $phanTram = 0;
        $giamToiDa = 0;
        $hanSuDung = 0;

        // Chỉ áp dụng từ 8 triệu trở lên
        if ($tongTien >= 25000000) {
            $phanTram = 15;
            $giamToiDa = 2000000;
            $hanSuDung = 15;
        } elseif ($tongTien >= 15000000) {
            $phanTram = 10;
            $giamToiDa = 1000000;
            $hanSuDung = 10;
        } elseif ($tongTien >= 8000000) {
            $phanTram = 5;
            $giamToiDa = 500000;
            $hanSuDung = 7;
        } else {
            return; // Không đủ điều kiện nhận mã
        }

        $ma = Str::upper(Str::random(8));
        $voucher = KhuyenMai::create([
            'ma_khuyen_mai' => $ma,
            'phan_tram_khuyen_mai' => $phanTram,
            'giam_toi_da' => $giamToiDa,
            'ngay_bat_dau' => now(),
            'ngay_ket_thuc' => now()->addDays($hanSuDung),
            'trang_thai' => true,
            'so_luong' => 1,
            'da_su_dung' => 0,
            'user_id' => $hoaDon->user_id,
            'loai_ma' => 'ca_nhan',
        ]);

        Mail::to($hoaDon->email)->send(new MaGiamGiaMoi($ma, $voucher));
    }
    // sửa đoạn này updatePaymentStatus
    public function updatePaymentStatus($orderId)
    {
        $hoaDon = HoaDon::findOrFail($orderId);
        //  Cập nhật trạng thái thanh toán
        $hoaDon->trang_thai_thanh_toan = HoaDon::TRANG_THAI_THANH_TOAN['Đã thanh toán'];
        $hoaDon->thoi_gian_giao_dich = now();
        $hoaDon->save();
        // Nếu có mã khuyến mãi thì cập nhật số lần sử dụng
        if ($hoaDon->ma_khuyen_mai && $hoaDon->phuong_thuc_thanh_toan !== 'cod') {
            $discount = KhuyenMai::where('ma_khuyen_mai', $hoaDon->ma_khuyen_mai)->first();

            if ($discount) {
                $discount->increment('da_su_dung');

                if (!is_null($discount->so_luong) && $discount->da_su_dung >= $discount->so_luong) {
                    $discount->trang_thai = false;
                }

                $discount->save();
            }
        }

        // Kiểm tra và tặng mã giảm giá nếu đơn đủ điều kiện
        if ($hoaDon->tong_tien >= 8000000) {
            if (
                $hoaDon->phuong_thuc_thanh_toan === 'vnpay' ||
                ($hoaDon->phuong_thuc_thanh_toan === 'cod' && $hoaDon->trang_thai === HoaDon::TRANG_THAI['Đã giao'])
            ) {
                $this->sendVoucherAfterPaid($hoaDon);
            }
        }

        // Gửi email xác nhận thanh toán thành công
        try {
            Mail::to($hoaDon->email)->send(new InvoiceCreated($hoaDon));
        } catch (\Exception $e) {
            Log::error("Không thể gửi email: " . $e->getMessage());
        }

        return redirect()->route('customer.donhang');

    }
}

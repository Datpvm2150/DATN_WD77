<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;
use Illuminate\Support\Facades\Auth;
use App\Models\DoiQua;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DoiQuaController extends Controller
{
    public function index()
    {
        // Lấy các mã khuyến mại loại đổi quà, còn hoạt động
        $maDoiQuas = KhuyenMai::where('loai_ma', 'ma_doi_qua')
            ->where('trang_thai', 1)
            ->get();

        return view('clients.doiqua', compact('maDoiQuas'));
    }

public function redeem(Request $request, $id)
{
    $user = Auth::user();

    $voucher = KhuyenMai::where('id', $id)
        ->where('loai_ma', 'ma_doi_qua')
        ->where('trang_thai', 1)
        ->firstOrFail();

    // Kiểm tra nếu người dùng đã đổi mã này
    $daDoi = DoiQua::where('user_id', $user->id)
        ->where('khuyen_mai_id', $voucher->id)
        ->exists();

    if ($daDoi) {
        return back()->with('error', 'Bạn đã đổi mã này rồi.');
    }

    // Kiểm tra đủ điểm
    if ($user->diem_tich_luy < $voucher->diem_can) {
        return back()->with('error', 'Bạn không đủ điểm để đổi quà này.');
    }

    // Kiểm tra số lượng
    if (!is_null($voucher->so_luong) && $voucher->so_luong <= 0) {
        return back()->with('error', 'Mã khuyến mại này đã hết lượt đổi.');
    }

    DB::beginTransaction();
    try {
        // Trừ điểm
        $user->diem_tich_luy -= $voucher->diem_can;
        $user->save();

        // Tạo mã cá nhân (giữ nguyên tên mã)
        $personalVoucher = $voucher->replicate();
        $personalVoucher->loai_ma = 'ca_nhan';
        $personalVoucher->user_id = $user->id;
        $personalVoucher->ma_khuyen_mai = $voucher->ma_khuyen_mai;
        $personalVoucher->so_luong = null; // mã cá nhân không cần giới hạn
        $personalVoucher->save();

        // Giảm số lượng nếu có giới hạn
        if (!is_null($voucher->so_luong)) {
            $voucher->so_luong -= 1;
            $voucher->save();
        }

        // Lưu lịch sử
        DoiQua::create([
            'user_id' => $user->id,
            'khuyen_mai_id' => $voucher->id,
            'diem_su_dung' => $voucher->diem_can,
            'trang_thai' => 'thanh_cong',
        ]);

        DB::commit();
        return back()->with('success', 'Đổi quà thành công! Mã giảm giá đã được thêm vào tài khoản của bạn.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại.');
    }
}


}

<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use App\Models\LichSuDiem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoiDiemController extends Controller
{
    public function doiDiem(Request $request)
    {
        $user = auth()->user();
        $khuyenMaiId = $request->input('khuyen_mai_id');
        $khuyenMai = KhuyenMai::findOrFail($khuyenMaiId);

        // Kiểm tra loại mã và điểm đủ
        if ($khuyenMai->loai_ma !== 'ma_doi_qua' || $user->diem_tich_luy < $khuyenMai->diem_can) {
            return response()->json(['error' => 'Điều kiện đổi điểm không hợp lệ.'], 400);
        }

        DB::transaction(function () use ($user, $khuyenMai) {
            // Trừ điểm
            $user->diem_tich_luy -= $khuyenMai->diem_can;
            $user->save();

            // Tạo mã khuyến mại cá nhân cho user (nếu cần)
            $personalCode = KhuyenMai::create([
                'ma_khuyen_mai' => $khuyenMai->ma_khuyen_mai,
                'phan_tram_khuyen_mai' => $khuyenMai->phan_tram_khuyen_mai,
                'giam_toi_da' => $khuyenMai->giam_toi_da,
                'user_id' => $user->id,
                'so_luong' => 1,
                'da_su_dung' => 0,
                'loai_ma' => 'ca_nhan',
                'diem_can' => $khuyenMai->diem_can,
                'ngay_bat_dau' => $khuyenMai->ngay_bat_dau,
                'ngay_ket_thuc' => $khuyenMai->ngay_ket_thuc,
                'trang_thai' => 1,
            ]);

            // Lưu lịch sử đổi điểm
            LichSuDiem::create([
                'user_id' => $user->id,
                'thay_doi' => -$khuyenMai->diem_can,
                'loai' => 'doi_diem',
                'noi_dung' => 'Đổi mã khuyến mại',
            ]);
        });

        return response()->json(['success' => 'Đổi điểm thành công.'], 200);
    }
}
<?php

namespace App\Http\Middleware;

use App\Models\KhuyenMai;
use App\Models\HoaDon;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDisscountMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $ma = $request->input('discount_code');
        $now = Carbon::now();

        // Cập nhật trạng thái các mã hết hạn
        $discounts = KhuyenMai::all();
        foreach ($discounts as $discount) {
            if ($discount->ngay_ket_thuc < $now && $discount->trang_thai != false) {
                $discount->update(['trang_thai' => false]);
            }
        }

        // Nếu có người nhập mã thì kiểm tra
        if ($ma) {
            $discount = KhuyenMai::where('ma_khuyen_mai', $ma)->first();
            if ($discount->user_id && $discount->user_id !== Auth::id()) {
                return redirect()->back()->withErrors(['discount_code' => 'Mã giảm giá không hợp lệ.']);
            }

            if ($discount->da_su_dung) {
                return redirect()->back()->withErrors(['discount_code' => 'Mã giảm giá đã được sử dụng.']);
            }


            if (!$discount || $discount->trang_thai != 1) {
                return response()->json(['success' => false, 'message' => 'Mã không hợp lệ']);
            }

            // Nếu mã dành riêng cho user
            if ($discount->user_id && $discount->user_id != $user->id) {
                return response()->json(['success' => false, 'message' => 'Mã không dành cho bạn']);
            }

            // Kiểm tra thời gian hiệu lực
            if ($now->lt($discount->ngay_bat_dau) || $now->gt($discount->ngay_ket_thuc)) {
                return response()->json(['success' => false, 'message' => 'Mã đã hết hạn']);
            }

            // Kiểm tra số lần đã dùng theo user
            $daSuDung = HoaDon::where('user_id', $user->id)
                ->where('ma_khuyen_mai', $ma)
                ->count();

            if ($discount->so_luong !== null && $daSuDung >= $discount->so_luong) {
                return response()->json(['success' => false, 'message' => 'Bạn đã dùng hết số lần sử dụng mã này']);
            }
        }

        return $next($request);
    }
}

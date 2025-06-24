<?php

namespace App\Http\Controllers\Client;;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\HoaDon;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ThanhToanController extends Controller
{
    public function index()
    {
        // chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        if (!Auth::check()) {
            return redirect()->route('customer.login');
        }
        // Lấy thông tin người dùng và địa chỉ đã sử dụng trước đó
        $user = Auth::user();
        $diaChiDaSuDung = HoaDon::where('user_id', $user->id)
            ->where('trang_thai', 7)
            ->pluck('dia_chi_nhan_hang')
            ->unique(); // loại bỏ địa chỉ khi bị trùng

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if (!$oldCart) {
            // nếu không có giỏ hàng, chuyển hướng đến trang đơn hàng
            return redirect()->to('http://127.0.0.1:8000/customer/donhang');
        }
        $cart = new Cart($oldCart);

        // Lấy mã giảm giá và kiểm tra tính hợp lệ
        $discountCode = Session::get('discount_code', null);
        $discountPercentage = Session::get('discount_percentage', 0);
        $maxDiscount = Session::get('maxDiscount', null);
        if ($discountCode) {
            $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
            $nowDate = now();
            if (!$discount || !$nowDate->between($discount->ngay_bat_dau, $discount->ngay_ket_thuc)) {
                // Xóa giảm giá nếu không hợp lệ
                Session::forget('discount_code');
                Session::forget('discount_percentage');
                Session::forget('maxDiscount');
                $discountPercentage = 0;
            }
        }
        // Tính toán số tiền giảm giá và tổng tiền
        $originalTotal = $cart->totalPrice; // Tổng giá trước khi giảm giá
        $discountAmount = $originalTotal * ($discountPercentage / 100);
        // Áp dụng giới hạn giảm giá tối đa
        if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
            $discountAmount = $maxDiscount;
        }

        $discountedTotal = $originalTotal - $discountAmount + 50000;
        return view('clients.thanhtoan', [
            'cart' => $cart,
            'discountedTotal' => $discountedTotal,
            'discountAmount' => $discountAmount,
            'discountPercentage' => $discountPercentage,
            'discountCode' => $discountCode,
            'diaChiDaSuDung' => $diaChiDaSuDung
            
        ]);
    }

    public function applyDiscount(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $discountCode = $request->input('discount_code'); //Lấy mã giảm giá từ form
        Log::info("Received discount code: " . $discountCode);

        $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();

        if ($discount) {
            $nowDate = now();
            $startDate = $discount->ngay_bat_dau;
            $endDate = $discount->ngay_ket_thuc;

            if ($nowDate->between($startDate, $endDate)) {
                $discountPercentage = $discount->phan_tram_khuyen_mai;
                $maxDiscount = $discount->giam_toi_da; // Lấy mức giảm giá tối đa từ cơ sở dữ liệu

                // Tính tổng tiền trước giảm giá
                $originalTotal = $cart->totalPrice; // Tổng giá trước giảm giá (bao gồm phí vận chuyển)

                // Tính số tiền giảm giá
                $discountAmount = $originalTotal * ($discountPercentage / 100);

                // Áp dụng giới hạn giảm giá tối đa
                if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
                    $discountAmount = $maxDiscount;
                }
                // Tổng tiền sau giảm giá
                $discountedTotal = $originalTotal - $discountAmount + 50000;

                // Lưu mã giảm giá và phần trăm giảm giá vào session
                $request->session()->put('discount_code', $discountCode);
                $request->session()->put('discount_percentage', $discountPercentage);
                $request->session()->put('discount_amount', $discountAmount); // Lưu số tiền giảm giá
                $request->session()->put('maxDiscount', $maxDiscount); // Lưu số tiền giảm giá

                // Trả về phản hồi JSON thành công
                return response()->json([
                    'success' => true,
                    'message' => 'Mã giảm giá đã được áp dụng.',
                    'discount_percentage' => $discountPercentage,
                    'discount_code' => $discountCode,
                    'discount_amount' => $discountAmount,
                    'new_total' => $discountedTotal, // Trả về tổng tiền mới
                    'new_giamgia' => $discountAmount
                ]);
            } else {
                // Trả về phản hồi JSON cho mã hết hạn
                return response()->json([
                    'success' => false,
                    'message' => 'Mã giảm giá đã hết hạn.'
                ]);
            }
        }
        // Trả về phản hồi JSON cho mã không hợp lệ
        return response()->json([
            'success' => false,
            'message' => 'Mã giảm giá không hợp lệ.'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Client;;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VNPayController;
use App\Mail\InvoiceCreated;
use App\Models\BienTheSanPham;
use App\Models\ChiTietHoaDon;
use App\Models\HoaDon;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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

    public function removeDiscount(Request $request)
    {   // Xóa mã giảm giá trong session
        $request->session()->forget('discount_code');
        $request->session()->forget('discount_percentage');
        // Kiểm tra nếu có giỏ hàng trong session
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if (!$oldCart) {
            return response()->json([
                'success' => false,
                'message' => 'Giỏ hàng không tồn tại.'
            ]);
        }

        $cart = new Cart($oldCart);
        $discountPercentage = Session::get('discount_percentage', 0);



        // Tính lại tổng tiền sau khi xóa mã giảm giá
        $discountedTotal = ($cart->totalPrice + 50000) * (1 - $discountPercentage / 100);
        $giamgia = 0;
        return response()->json([
            'success' => true,
            'message' => 'Mã giảm giá đã được xóa.',
            'new_total' => $discountedTotal, // Trả về tổng tiền sau khi xóa mã giảm giá
            'new_giamgia' => $giamgia // Trả về tổng tiền sau khi xóa mã giảm giá

        ]);
    }
    public function placeOrder(Request $request)
    {
        try {
            // Kiểm tra giỏ hàng trong session
            $cart = Session::get('cart');
            if (!$cart || !isset($cart->products)) {
                Log::error("Giỏ hàng trống hoặc không hợp lệ.");
                return response()->json(['success' => false, 'message' => 'Giỏ hàng trống'], 400);
            }

            Log::info("Cart data before processing: ", (array) $cart);
            $outOfStock = [];
            $notFound = [];
            $insufficientStock = [];
            $updatedTotalPrice = 0;

            foreach ($cart->products as $key => $item) {
                if (!isset($item['bienthe']->id)) {
                    Log::error("Sản phẩm không có ID biến thể: ", (array)$item);
                    $notFound[] = [
                        'product_name' => $item['bienthe']->ten_san_pham ?? 'Sản phẩm không xác định',
                        'message' => 'Thiếu thông tin ID biến thể sản phẩm.',
                    ];
                    continue;
                }

                $bienThe = BienTheSanPham::find($item['bienthe']->id);
                if (is_null($bienThe)) {
                    $notFound[] = [
                        'product_name' => $item['bienthe']->ten_san_pham ?? 'Sản phẩm không xác định',
                        'message' => 'Sản phẩm hoặc biến thể không tồn tại trong hệ thống.',
                    ];
                    continue;
                }

                if ($bienThe->so_luong === 0) {
                    $outOfStock[] = [
                        'product_name' => $bienThe->sanPham->ten_san_pham,
                        'message' => 'Sản phẩm đã hết hàng.',
                    ];
                    continue;
                }

                $availableQuantity = min($item['quantity'], $bienThe->so_luong);
                if ($item['quantity'] > $bienThe->so_luong) {
                    $insufficientStock[] = [
                        'product_name' => $bienThe->sanPham->ten_san_pham,
                        'available_quantity' => $bienThe->so_luong,
                        'message' => 'Số lượng không đủ tồn kho.',
                    ];
                }

                $updatedTotalPrice += $availableQuantity * $item['bienthe']->gia_moi;
                $cart->products[$key]['quantity'] = $availableQuantity;
            }

            $cart->totalPrice = $updatedTotalPrice;
            Session::put('cart', $cart);

            $response = [
                'success' => false,
                'message' => 'Một số vấn đề xảy ra khi cập nhật giỏ hàng.',
            ];
            if (!empty($notFound)) $response['not_found'] = $notFound;
            if (!empty($outOfStock)) $response['out_of_stock'] = $outOfStock;
            if (!empty($insufficientStock)) $response['insufficient_stock'] = $insufficientStock;
            if (!empty($notFound) || !empty($outOfStock) || !empty($insufficientStock)) {
                return response()->json($response);
            }

            $discountCode = Session::get('discount_code', null);
            $discountPercentage = Session::get('discount_percentage', 0);
            $maxDiscount = Session::get('maxDiscount', null);
            if ($discountCode) {
                $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
                $nowDate = now();
                if (!$discount || !$nowDate->between($discount->ngay_bat_dau, $discount->ngay_ket_thuc)) {
                    Session::forget('discount_code');
                    Session::forget('discount_percentage');
                    $discountPercentage = 0;
                }
            }

            $originalTotal = $cart->totalPrice;
            $discountAmount = $originalTotal * ($discountPercentage / 100);
            if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
                $discountAmount = $maxDiscount;
            }
            $tongTienSauGiam = $originalTotal - $discountAmount + 50000;

            $userId = auth()->id();
            if (!$userId) {
                Log::error("Người dùng chưa đăng nhập.");
                return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để đặt hàng'], 401);
            }

            $hoaDon = HoaDon::create([
                'ma_hoa_don' => date("ymd") . rand(0, 1000000),
                'user_id' => $userId,
                'giam_gia' => $discountAmount,
                'tong_tien' => $tongTienSauGiam,
                'dia_chi_nhan_hang' => $request->address,
                'email' => $request->email,
                'so_dien_thoai' => $request->phone,
                'ten_nguoi_nhan' => $request->name,
                'ngay_dat_hang' => now(),
                'ghi_chu' => $request->note,
                'phuong_thuc_thanh_toan' => $request->payment_method,
                'trang_thai' => HoaDon::CHO_XAC_NHAN,
                'trang_thai_thanh_toan' => HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'],
                'thoi_gian_het_han' => now()->addDays(1),
                /* 'thoi_gian_het_han' => now()->addMinutes(15), // Thời gian hết hạn 15 phút */
            ]);

            Log::info("Hóa đơn đã tạo: ", (array) $hoaDon);

            foreach ($cart->products as $item) {
                $bienThe = BienTheSanPham::find($item['bienthe']->id);
                if (!$bienThe) continue;

                ChiTietHoaDon::create([
                    'hoa_don_id' => $hoaDon->id,
                    'bien_the_san_pham_id' => $bienThe->id,
                    'so_luong' => $item['quantity'],
                    'don_gia' => $item['bienthe']->gia_moi,
                    'thanh_tien' => $item['quantity'] * $item['bienthe']->gia_moi,
                ]);

                $bienThe->so_luong -= $item['quantity'];
                $bienThe->save();
            }

            Session::forget('cart');
            Session::forget('discount_code');
            Session::forget('discount_percentage');
            Session::forget('maxDiscount');

            // **Xử lý theo từng phương thức thanh toán**
            switch ($request->payment_method) {
                case 'Thanh toán qua chuyển khoản ngân hàng':
                    return app(VNPayController::class)->createPayment(
                        $tongTienSauGiam,
                        $hoaDon->ma_hoa_don,
                        "Thanh toán đơn hàng #$hoaDon->ma_hoa_don"
                    );

                case 'Thanh toán khi nhận hàng':
                    $hoaDon->update(['trang_thai_thanh_toan' => HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán']]);
                    return response()->json(['success' => true, 'message' => 'Đặt hàng thành công, thanh toán khi nhận hàng.']);

                case 'Thanh toán qua ví điện tử':
                    return app(EWalletController::class)->processPayment(
                        $tongTienSauGiam,
                        $hoaDon->ma_hoa_don,
                        $request->ewallet_id
                    );

                default:
                    return response()->json(['success' => false, 'message' => 'Phương thức thanh toán không hợp lệ'], 400);
            }
        } catch (\Exception $e) {
            dd($e);
            Log::error("Lỗi khi đặt hàng: " . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Đã xảy ra lỗi khi đặt hàng'], 500);
        }
    }
    protected function createInvoice($userId, $request, $cart, $giamGia, $tongTienSauGiam)
    {
        // tạo hóa đơn
        $hoaDon = HoaDon::create([
            'ma_hoa_don' => 'HD' . time(),
            'user_id' => $userId,
            'giam_gia' => $giamGia,
            'tong_tien' => $tongTienSauGiam,
            'dia_chi_nhan_hang' => $request->address,
            'email' => $request->email,
            'so_dien_thoai' => $request->phone,
            'ten_nguoi_nhan' => $request->name,
            'ngay_dat_hang' => now(),
            'ghi_chu' => $request->note,
            'phuong_thuc_thanh_toan' => $request->payment_method,
            'trang_thai' => HoaDon::CHO_XAC_NHAN,
            'trang_thai_thanh_toan' => HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán']
        ]);
        Log::info("Hóa đơn đã tạo: ", (array) $hoaDon);
        foreach ($cart->products as $item) {
            Log::info("Chi tiết sản phẩm: ", (array) $item);
            //Tìm biến thể sản phẩm trong db
            $bienThe = BienTheSanPham::find($item['bienthe']->id);
            //Kiểm tra tồn kho trước khi giảm số lượng
            if ($bienThe->so_luong < $item['quantity']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sản phẩm ' . $bienThe->sanPham->ten_san_pham . ' chỉ còn lại ' . $bienThe->so_luong . ' trong kho.',
                ]);
            }

            //Tạo chi tiết hóa đơn
            ChiTietHoaDon::create([
                'hoa_don_id' => $hoaDon->id,
                'bien_the_san_pham_id' => $item['bienthe']->id,
                'so_luong' => $item['quantity'],
                'don_gia' => $item['bienthe']->gia_moi,
                'thanh_tien' => $item['quantity'] * $item['bienthe']->gia_moi,
            ]);
            //Giảm số lượng tồn kho
            $bienThe->so_luong = $bienThe->so_luong - $item['quantity'];
            $bienThe->save();
        }
        // Gửi email xác nhận
        Mail::to($request->email)->send(new InvoiceCreated($hoaDon));

        // Xóa session giỏ hàng và mã giảm giá
        Session::forget('cart');
        Session::forget('discount_code');
        Session::forget('discount_percentage');
        Session::forget('maxDiscount');

        return response()->json(['success' => true, 'message' => 'Đặt hàng thành công']);
    }
}

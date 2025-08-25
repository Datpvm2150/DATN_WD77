<?php

namespace App\Http\Controllers\Client;;

use App\Services\OrderService;
use App\Cart;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Controllers\VNPayController;
use App\Mail\InvoiceCreated;
use App\Mail\Magiamgia;
use App\Mail\MaGiamGiaMoi;
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
    public function index(Request $request)
    {
        // Chuyển hướng đến trang đăng nhập nếu chưa đăng nhập
        if (!Auth::check()) {
            return redirect()->route('customer.login');
        }

        // Lấy thông tin người dùng và địa chỉ đã sử dụng trước đó
        $user = Auth::user();
        $diaChiDaSuDung = HoaDon::where('user_id', $user->id)
            ->where('trang_thai', 7)
            ->pluck('dia_chi_nhan_hang')
            ->unique(); // Loại bỏ các địa chỉ trùng lặp

        // Kiểm tra nếu có giỏ hàng trong session
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        if (!$oldCart) {
            // Nếu không có giỏ hàng, chuyển hướng đến trang đơn hàng
            return redirect()->to('http://127.0.0.1:8000/customer/donhang');
        }


        $cart = new Cart($oldCart);

        $selectedItems = $request->input('cart_items');

        if (empty($selectedItems)) {
                return redirect()->back()->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán.');
            }
        $totalPrice = 0;
        $filteredProducts = [];
        foreach ($cart->products as $key => $product) {
            if (in_array($key, $selectedItems)) {
                $gia = $product['bienthe']->gia_moi ?? $product['bienthe']->gia_cu;
                $totalPrice += $gia * $product['quantity'];
                $filteredProducts[$key] = $product;
            }
        }
        $cartToCheckout = clone $cart;
        $cartToCheckout->products = $filteredProducts;
        $cartToCheckout->totalPrice = $totalPrice;

        $discountCode = Session::get('discount_code', null);
        $discountPercentage = Session::get('discount_percentage', 0);
        $maxDiscount = Session::get('maxDiscount', null);
        if ($discountCode) {
            $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
            $nowDate = now();
            if (!$discount || !$nowDate->between($discount->ngay_bat_dau, $discount->ngay_ket_thuc)) {
                Session::forget('discount_code');
                Session::forget('discount_percentage');
                Session::forget('maxDiscount');
                $discountPercentage = 0;
            }
        }
        $originalTotal = $cartToCheckout->totalPrice;
        $discountAmount = $originalTotal * ($discountPercentage / 100);
        if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
            $discountAmount = $maxDiscount;
        }
        $discountedTotal = $originalTotal - $discountAmount + 50000; // 50000 phí ship)
        return view('clients.thanhtoan', [
            'cartToCheckout' => $cartToCheckout, // Truyền biến mới ra view
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

        $discountCode = $request->input('discount_code');
        Log::info("Received discount code: " . $discountCode);

        $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
        if (!$discount) {
            return response()->json(['success' => false, 'message' => 'Mã không hợp lệ.']);
        }

        // Nếu là mã được tặng riêng (cá nhân)
        if ($discount->loai_ma === 'ca_nhan') {
            if ($discount->user_id !== Auth::id()) {
                return response()->json(['success' => false, 'message' => 'Mã không áp dụng cho tài khoản này.']);
            }

            if ($discount->da_su_dung >= $discount->so_luong) {
                return response()->json(['success' => false, 'message' => 'Mã đã được sử dụng hết.']);
            }
        }

        // Kiểm tra hạn sử dụng (áp dụng cho mọi loại mã)
        $now = now();
        if (!$now->between($discount->ngay_bat_dau, $discount->ngay_ket_thuc)) {
            return response()->json(['success' => false, 'message' => 'Mã đã hết hạn.']);
        }

        // Tính toán giảm giá
        $discountPercentage = $discount->phan_tram_khuyen_mai;
        $maxDiscount = $discount->giam_toi_da;

        $originalTotal = $cart->totalPrice;
        $discountAmount = $originalTotal * ($discountPercentage / 100);
        if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
            $discountAmount = $maxDiscount;
        }

        $discountedTotal = $originalTotal - $discountAmount + 50000;
        Session::put('discount_code', $discount->ma_khuyen_mai);
        $request->session()->put('discount_code', $discountCode);
        $request->session()->put('discount_percentage', $discountPercentage);
        $request->session()->put('discount_amount', $discountAmount);
        $request->session()->put('maxDiscount', $maxDiscount);

        return response()->json([
            'success' => true,
            'message' => 'Mã giảm giá đã được áp dụng.',
            'discount_percentage' => $discountPercentage,
            'discount_code' => $discountCode,
            'discount_amount' => $discountAmount,
            'new_total' => $discountedTotal,
            'new_giamgia' => $discountAmount
        ]);
    }


    public function removeDiscount(Request $request)
    {
        // Lấy discount trước khi xóa khỏi session
        $discountPercentage = $request->session()->get('discount_percentage', 0);

        // Xóa mã giảm giá trong session
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

        // Tính lại tổng tiền sau khi xóa mã giảm giá
        $discountedTotal = ($cart->totalPrice + 50000); // tổng mới không áp dụng giảm
        $giamgia = ($cart->totalPrice + 50000) * ($discountPercentage / 100); // số tiền đã giảm trước đó

        return response()->json([
            'success' => true,
            'message' => 'Mã giảm giá đã được xóa.',
            'new_total' => $discountedTotal,
            'new_giamgia' => 0 // sau khi xóa thì không còn giảm nữa
        ]);
    }
    public function placeOrder(Request $request, OrderService $orderService)
    {
        try {
            // Lấy giỏ hàng từ session
            $cart = Session::get('cart');
            if (!$cart || !isset($cart->products)) {
                return response()->json(['success' => false, 'message' => 'Giỏ hàng trống'], 400);
            }

            // Lấy danh sách sản phẩm được chọn
            $selectedItems = $request->input('cart_items');

            $filteredProducts = [];
            $updatedTotalPrice = 0;
            $outOfStock = [];
            $notFound = [];
            $insufficientStock = [];

            // Lọc sản phẩm đã chọn và kiểm tra tồn kho
            foreach ($cart->products as $key => $item) {
                if (in_array($key, $selectedItems)) {
                    if (!isset($item['bienthe']->id)) {
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
                    $gia = $item['bienthe']->gia_moi ?? $item['bienthe']->gia_cu;
                    $updatedTotalPrice += $availableQuantity * $gia;
                    $item['quantity'] = $availableQuantity;
                    $filteredProducts[$key] = $item;
                }
            }

            // Nếu có lỗi về tồn kho hoặc sản phẩm, trả về thông báo
            $response = [
                'success' => false,
                'message' => 'Một số vấn đề xảy ra khi cập nhật giỏ hàng.',
            ];
            if (!empty($notFound))
                $response['not_found'] = $notFound;
            if (!empty($outOfStock))
                $response['out_of_stock'] = $outOfStock;
            if (!empty($insufficientStock))
                $response['insufficient_stock'] = $insufficientStock;
            if (!empty($notFound) || !empty($outOfStock) || !empty($insufficientStock)) {
                return response()->json($response);
            }

            // Áp dụng giảm giá trên tổng tiền sản phẩm đã chọn
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
            // Sử dụng $updatedTotalPrice thay vì $cart->totalPrice
            $originalTotal = $updatedTotalPrice;
            $discountAmount = $originalTotal * ($discountPercentage / 100);
            if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
                $discountAmount = $maxDiscount;
            }
            $tongTienSauGiam = $originalTotal - $discountAmount + 50000; // 50000 phí ship

            $userId = auth()->id();
            if (!$userId) {
                return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để đặt hàng'], 401);
            }

            // Tạo hóa đơn
            $hoaDon = HoaDon::create([
                'ma_hoa_don' => date("ymd") . rand(0, 1000000),
                'user_id' => $userId,
                'giam_gia' => $discountAmount,
                'ma_khuyen_mai' => $discountCode,
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
                'thoi_gian_het_han' => now()->addMinutes(15),
            ]);

            // Lưu chi tiết hóa đơn và cập nhật tồn kho chỉ cho sản phẩm đã chọn
            foreach ($filteredProducts as $item) {
                $bienThe = BienTheSanPham::find($item['bienthe']->id);
                if (!$bienThe)
                    continue;
                $gia = $item['bienthe']->gia_moi ?? $item['bienthe']->gia_cu;
                ChiTietHoaDon::create([
                    'hoa_don_id' => $hoaDon->id,
                    'bien_the_san_pham_id' => $bienThe->id,
                    'ten_san_pham' => $bienThe->sanPham->ten_san_pham ?? null,
                    'ten_dung_luong' => $bienThe->dungLuong->ten_dung_luong ?? null,
                    'ten_mau_sac' => $bienThe->mauSac->ten_mau_sac ?? null,
                    'so_luong' => $item['quantity'],
                    'don_gia' => $gia,
                    'thanh_tien' => $item['quantity'] * $gia,
                ]);
                $bienThe->so_luong -= $item['quantity'];
                $bienThe->save();
            }

            Session::forget('discount_code');
            Session::forget('discount_percentage');
            Session::forget('maxDiscount');

            // Xử lý theo phương thức thanh toán
            switch ($request->payment_method) {
                case 'Thanh toán qua chuyển khoản ngân hàng':
                    return app(VNPayController::class)->createPayment(
                        $tongTienSauGiam,
                        $hoaDon->ma_hoa_don,
                        "Thanh toán đơn hàng #$hoaDon->ma_hoa_don"
                    );
                    break;
                case 'Thanh toán khi nhận hàng':
                    $hoaDon->update([
                        'trang_thai_thanh_toan' => HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'],
                        'phuong_thuc_thanh_toan' => 'Thanh toán khi nhận hàng'
                    ]);
                    // Cập nhật số lần sử dụng mã khuyến mãi nếu có
                    if ($discountCode) {
                        $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
                        if ($discount) {
                            $discount->increment('da_su_dung');
                            if (!is_null($discount->so_luong) && $discount->da_su_dung >= $discount->so_luong) {
                                $discount->trang_thai = false;
                            }
                            $discount->save();
                        }
                    }
                    $oldCart = Session::get('cart');
                    if ($oldCart && isset($oldCart->products)) {
                        foreach ($oldCart->products as $cartKey => $cartItem) {
                            // Chỉ xóa sản phẩm đã chọn khỏi giỏ hàng
                            if (in_array($cartKey, array_keys($filteredProducts))) {
                                unset($oldCart->products[$cartKey]);
                            }
                        }

                        $oldCart->totalPrice = 0;
                        $oldCart->totalProduct = 0;
                        foreach ($oldCart->products as $item) {
                            $gia = $item['bienthe']->gia_moi ?? $item['bienthe']->gia_cu;
                            $oldCart->totalPrice += $item['quantity'] * $gia;
                            $oldCart->totalProduct += $item['quantity'];
                        }

                        if (count($oldCart->products) > 0) {
                            Session::put('cart', $oldCart);
                        } else {
                            Session::forget('cart');
                        }
                    }
                    return response()->json([
                        'success' => true,
                        'message' => 'Đặt hàng thành công, thanh toán khi nhận hàng. Sau khi thanh toán, mã giảm giá sẽ được gửi.'
                    ]);

                    break;
                default:
                    return response()->json(['success' => false, 'message' => 'Phương thức thanh toán không hợp lệ'], 400);
            }
        } catch (\Exception $e) {
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
                'ten_san_pham'   => $item['bienthe']->sanPham->ten_san_pham ?? null,
                'ten_dung_luong' => $item['bienthe']->dungLuong->ten_dung_luong ?? null,
                'ten_mau_sac'    => $item['bienthe']->mauSac->ten_mau_sac ?? null,
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

    public function retryPayment($id)
    {
        // Tìm hóa đơn theo ID
        $order = HoaDon::findOrFail($id);

        // Kiểm tra nếu trạng thái thanh toán là 'Chưa thanh toán' và thời gian hết hạn chưa qua
        if ($order->trang_thai_thanh_toan === HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'] && $order->thoi_gian_het_han > now()) {
            // Xử lý thanh toán lại (ví dụ: chuyển hướng tới cổng thanh toán)
            // Thực hiện thanh toán lại với cổng thanh toán (như ZaloPay, MoMo, v.v.)
            $newMaHoaDon = date("ymd") . rand(100000, 999999);  // Tạo mã đơn mới
            $order->update([
                'ma_hoa_don' => $newMaHoaDon,  // Cập nhật mã đơn mới

            ]);
            // Ví dụ: Chuyển hướng đến cổng thanh toán
            return app(VNPayController::class)->thanhToanLai($order->tong_tien,  $newMaHoaDon, "Thanh toán lại đơn hàng #$order->id");
        }

        // Nếu không thể thanh toán lại (đã thanh toán hoặc hết hạn)
        return back()->with('error', 'Không thể thanh toán lại đơn hàng này.');
    }
}

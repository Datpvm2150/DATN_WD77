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
    public function index()
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
        $originalTotal = $cart->totalPrice; // Tổng giá trước giảm giá
        $discountAmount = $originalTotal * ($discountPercentage / 100);

        // Áp dụng giới hạn giảm giá tối đa
        if ($maxDiscount > 0 && $discountAmount > $maxDiscount) {
            $discountAmount = $maxDiscount;
        }
        // Tổng tiền sau khi giảm giá
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
                // nếu không có giá mới thì sẽ lấy giá cũ
                $gia = $item['bienthe']->gia_moi ?? $item['bienthe']->gia_cu;
                $updatedTotalPrice += $availableQuantity * $gia;

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

            $hoaDon = HoaDon::create(attributes: [
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
                'thoi_gian_het_han' => now()->addDays(1),
                /*'thoi_gian_het_han' => now()->addMinutes(15), // Thời gian hết hạn 15 phút */
            ]);

            if ($discountCode) {
                $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();
            }


            Log::info("Hóa đơn đã tạo: ", (array) $hoaDon);

            foreach ($cart->products as $item) {
                $bienThe = BienTheSanPham::find($item['bienthe']->id);
                if (!$bienThe) continue;
                // Nếu không có giá mới thì lấy giá cũ
                $gia = $item['bienthe']->gia_moi ?? $item['bienthe']->gia_cu;

                ChiTietHoaDon::create([
                    'hoa_don_id' => $hoaDon->id,
                    'bien_the_san_pham_id' => $bienThe->id,
                    'so_luong' => $item['quantity'],
                    'don_gia' => $gia,
                    'thanh_tien' => $item['quantity'] * $gia,
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
                    //   sửa đoạn này
                    $hoaDon->update([
                        'trang_thai_thanh_toan' => HoaDon::TRANG_THAI_THANH_TOAN['Chưa thanh toán'],
                        'phuong_thuc_thanh_toan' => 'Thanh toán khi nhận hàng'
                    ]);
                    //     Cập nhật số lần sử dụng mã khuyến mãi nếu có
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
                    return response()->json([
                        'success' => true,
                        'message' => 'Đặt hàng thành công, thanh toán khi nhận hàng. Sau khi thanh toán, mã giảm giá sẽ được gửi.'
                    ]);


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
    public function initiateZaloPayPayment($userId, $request, $cart, $giamGia, $tongTienSauGiam, $maHoaDon)
    {
        $zaloPayConfig = [
            'app_id' => 2553,
            'key' => 'PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL',
            "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
            'endpoint' => 'https://sb-openapi.zalopay.vn/v2/create',
        ];

        $transID = 'HD' . $maHoaDon;
        $embedData = json_encode(['redirecturl' => 'http://127.0.0.1:8000/customer/donhang']);
        $itemsArray = [];

        foreach ($cart->products as $product) {
            $gia = $product['bienthe']->gia_moi ?? $product['bienthe']->gia_cu;
            $itemsArray[] = [
                'itemid' => (string) $product['bienthe']->id,
                'itemname' => $product['bienthe']->ten_san_pham,
                'itemprice' => $gia,
                'itemquantity' => $product['quantity'],
            ];
        }
        $data = [
            'app_id' => $zaloPayConfig['app_id'],
            'app_time' => round(microtime(true) * 1000),
            'app_trans_id' => $maHoaDon,
            'app_user' => "user$userId",
            'item' => json_encode($itemsArray),
            'embed_data' => $embedData,
            'amount' => $tongTienSauGiam,
            'description' => "Thanh toán cho đơn hàng #$transID",
            'callback_url' => 'https://87bc-2402-800-61c5-c394-382b-d4ca-68db-3ebc.ngrok-free.app/zalopay/callback',
        ];

        $data['mac'] = $this->generateZaloPaySignature($data, $zaloPayConfig['key']);

        Log::info('ZaloPay request data:', $data);

        try {
            $response = $this->sendToZaloPay($zaloPayConfig['endpoint'], $data);
            Log::info('ZaloPay response:', $response);
        } catch (\Exception $e) {

            $maHoaDon->trang_thai_thanh_toan = HoaDon::TRANG_THAI_THANH_TOAN['Thanh toán thất bại'];
            Log::error('Error sending request to ZaloPay:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'message' => 'Error sending request to ZaloPay'], 500);
        }

        if (isset($response['return_code']) && $response['return_code'] == '1') {
            // Xóa session giỏ hàng và mã giảm giá
            Session::forget('cart');
            Session::forget('discount_code');
            Session::forget('discount_percentage');
            Session::forget('maxDiscount');

            return response()->json(['success' => true, 'order_url' => $response['order_url']]);
        }

        return response()->json(['success' => false, 'message' => 'Error redirecting to ZaloPay'], 500);
    }

    private function generateZaloPaySignature(array $data, $key)
    {
        $signatureData = implode('|', [
            $data['app_id'],
            $data['app_trans_id'],
            $data['app_user'],
            $data['amount'],
            $data['app_time'],
            $data['embed_data'],
            $data['item']
        ]);
        return hash_hmac('sha256', $signatureData, $key);
    }

    private function sendToZaloPay($url, $data)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->post($url, [
                'headers' => ['Content-Type' => 'application/json'],
                'json' => $data,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            Log::error('Error sending request to ZaloPay:', ['error' => $e->getMessage()]);
            return ['success' => false, 'message' => 'Error sending request to ZaloPay'];
        }
    }
    public function handleZaloPayCallback(Request $request)
    {
        Log::info("Received ZaloPay callback", ['data' => $request->all()]);

        $result = [];
        try {
            $key2 = "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz"; // Khóa bí mật của bạn
            $postdata = $request->getContent();
            $postdatajson = json_decode($postdata, true);

            // Kiểm tra xem dữ liệu có tồn tại hay không
            if (!isset($postdatajson["data"]) || !isset($postdatajson["mac"])) {
                Log::error("Dữ liệu callback không hợp lệ.");
                $result["return_code"] = -1;
                $result["return_message"] = "Invalid callback data.";
                return response()->json($result);
            }

            // Kiểm tra tính hợp lệ của MAC
            $mac = hash_hmac("sha256", $postdatajson["data"], $key2);
            if (strcmp($mac, $postdatajson["mac"]) !== 0) {
                Log::error("Invalid callback MAC from ZaloPay.");
                $result["return_code"] = -1;
                $result["return_message"] = "MAC not equal";
                return response()->json($result);
            }

            // Giải mã dữ liệu
            $data = json_decode($postdatajson["data"], true);

            // Kiểm tra các trường cần thiết từ ZaloPay
            if (!isset($data["app_trans_id"]) || !isset($data["amount"])) {
                Log::error("Thiếu thông tin cần thiết từ ZaloPay.");
                $result["return_code"] = -3;
                $result["return_message"] = "Missing required fields.";
                return response()->json($result);
            }

            $order = HoaDon::where('ma_hoa_don', $data['app_trans_id'])->first();

            if ($order) {
                // Cập nhật trạng thái hóa đơn tùy theo logic của bạn (ví dụ kiểm tra `amount` hoặc `zp_trans_id` nếu cần)
                $order->trang_thai_thanh_toan = HoaDon::TRANG_THAI_THANH_TOAN['Đã thanh toán'];

                $order->save();

                Log::info("Cập nhật trạng thái đơn hàng thành công: ", (array)$order);
                $result["return_code"] = 1;
                $result["return_message"] = "Cập nhật trạng thái đơn hàng thành công.";
                return response()->json($result);
            } else {
                Log::error("Không tìm thấy hóa đơn với mã: " . $data['app_trans_id']);
                $result["return_code"] = -3;
                $result["return_message"] = "Không tìm thấy hóa đơn.";
                return response()->json($result);
            }
        } catch (\Exception $e) {
            Log::error("Lỗi trong callback từ ZaloPay: " . $e->getMessage());
            $result["return_code"] = 0;
            $result["return_message"] = "Error: " . $e->getMessage();
        }

        return response()->json($result);
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

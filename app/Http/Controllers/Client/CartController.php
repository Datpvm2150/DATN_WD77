<?php

namespace App\Http\Controllers\Client;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\KhuyenMai;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function index()
    {
        // dd( Session::get('discount_code'));
        $this->UpdateCart();
        return view('clients.cart.cart');
    }

    public function AddCart(Request $request, string $id)
    {
        $this->UpdateCart();
        $quantity = intval($request->query('quantity'));
        $mauSacId = intval($request->query('mauSacId'));
        $dungLuongId = intval($request->query('dungLuongId'));

        if (!$quantity || !$mauSacId || !$dungLuongId) {
            return redirect()->back()->with('error', 'Thông tin sản phẩm không đầy đủ.');
        }
        $product = SanPham::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
        $bienthe = BienTheSanPham::where('san_pham_id', $id)->where('dung_luong_id', $dungLuongId)->where('mau_sac_id', $mauSacId)->first();
        if (!$bienthe) {
            return redirect()->back()->with('error', 'Biến thể không tồn tại.');
        }
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->AddCart($product, $bienthe, $quantity);
        $request->session()->put('cart', $newCart);
        return view('clients.cart.cart-drop');
    }

    public function DeleteItemCart(Request $request, $idbt)
    {
        $this->UpdateCart();
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($idbt);
        if (count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart');
            Session::forget('discount_code');
            Session::forget('discount_percentage');
            Session::forget('maxDiscount');
        }
        return view('clients.cart.cart-drop');
    }

    public function DeleteItemListCart(Request $request, $idbt)
    {
        $this->UpdateCart();
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($idbt);
        if (count($newCart->products) > 0) {
            $request->session()->put('cart', $newCart);
        } else {
            $request->session()->forget('cart');
            Session::forget('discount_code');
            Session::forget('discount_percentage');
            Session::forget('maxDiscount');
        }
        return view('clients.cart.cart-list');
    }

    public function UpdateItemCart(Request $request, $idbt)
    {
        $this->UpdateCart();
        $quantity = intval($request->query('quantity'));
        if ($quantity < 1) {
            $quantity = 1;
        }
        $oldCart = Session('cart') ? Session('cart') : [];
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($idbt, $quantity);
        $request->session()->put('cart', $newCart);
        return view('clients.cart.cart-list');
    }

    public function  CartListDrop()
    {
        $this->UpdateCart();
        return view('clients.cart.cart-drop');
    }

    public function  CartList()
    {
        $this->UpdateCart();
        return view('clients.cart.cart-list');
    }


    public function discount(Request $request, string $discountCode)
    {
        $this->UpdateCart();
        Log::info("Received discount code: " . $discountCode);

        $discount = KhuyenMai::where('ma_khuyen_mai', $discountCode)->first();

        if (!$discount) {
            return response()->json(['message' => 'Mã giảm giá không hợp lệ.'], 404);
        }

        $now = now();

        // Kiểm tra mã cá nhân
        if ($discount->loai_ma === 'ca_nhan') {
            if (!auth()->check()) {
                return response()->json(['message' => 'Bạn cần đăng nhập để sử dụng mã này.'], 401);
            }

            // Nếu user hiện tại không phải là người nhận mã
            if ($discount->user_id != auth()->id()) {
                return response()->json(['message' => 'Mã này không áp dụng cho tài khoản của bạn.'], 403);
            }

            if ($discount->da_su_dung >= $discount->so_luong) {
                return response()->json(['message' => 'Mã giảm giá đã được sử dụng hết.'], 400);
            }
        }

        // Kiểm tra thời hạn áp dụng cho mọi loại mã
        if (!$now->between($discount->ngay_bat_dau, $discount->ngay_ket_thuc)) {
            return response()->json(['message' => 'Mã giảm giá đã hết hạn.'], 400);
        }

        // Lưu vào session nếu hợp lệ
        $request->session()->put('discount_code', $discount->ma_khuyen_mai);
        $request->session()->put('discount_percentage', $discount->phan_tram_khuyen_mai);
        $request->session()->put('maxDiscount', $discount->giam_toi_da);

        return view('clients.cart.cart-list', [
            'discount' => $discount->phan_tram_khuyen_mai,
            'maxDiscount' => $discount->giam_toi_da
        ]);
    }

    public function  UpdateCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
            $totalPrice = 0;
            foreach ($cart->products as $idbt => $product) {
                $bienThe = BienTheSanPham::where('id', $idbt)->first();
                if ($bienThe) {
                    $sanPham = SanPham::where('id', $bienThe->san_pham_id)->first();
                    if ($sanPham) {
                        $cart->products[$idbt]['bienthe'] = $bienThe;
                        if ($product['quantity'] >= $bienThe->so_luong) {
                            $cart->products[$idbt]['quantity'] = $bienThe->so_luong;
                        }
                        if ($bienThe->so_luong <= 0) {
                            unset($cart->products[$idbt]);
                            continue;
                        }
                        // nếu không có giá mới thì sẽ lưu giá cũ
                        $gia = $bienThe->gia_moi ?? $bienThe->gia_cu;
                        $totalPrice += $cart->products[$idbt]['quantity'] * $gia;
                    } else {
                        unset($cart->products[$idbt]);
                        continue;
                    }
                } else {
                    unset($cart->products[$idbt]);
                    continue;
                }
            }
            if (count($cart->products) > 0) {
                $cart->totalProduct = count($cart->products);
                $cart->totalPrice = $totalPrice;
                Session::put('cart', value: $cart);
            } else {
                Session::forget('cart');
            }
        }
    }

    public function  DeleteDiscount()
    {
        Session::forget('discount_code');
        Session::forget('discount_percentage');
        Session::forget('maxDiscount');
        return view('clients.cart.cart-list');
    }
}
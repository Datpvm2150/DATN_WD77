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
            return response()->json(['message' => 'Thông tin sản phẩm không đầy đủ.'], 400);
        }

        $product = SanPham::find($id);
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại.'], 404);
        }

        $bienthe = BienTheSanPham::where('san_pham_id', $id)
            ->where('dung_luong_id', $dungLuongId)
            ->where('mau_sac_id', $mauSacId)
            ->first();

        if (!$bienthe) {
            return response()->json(['message' => 'Biến thể không tồn tại.'], 404);
        }

        $oldCart = Session::has('cart') ? Session::get('cart') : [];
        $newCart = new Cart($oldCart);

        $existingQty = isset($newCart->products[$bienthe->id]) ? $newCart->products[$bienthe->id]['quantity'] : 0;
        $totalRequested = $existingQty + $quantity;

        if ($totalRequested > $bienthe->so_luong) {
            $soConLai = $bienthe->so_luong - $existingQty;
            return response()->json([
                'message' => 'Giỏ hàng vượt quá số lượng tồn kho. Bạn chỉ có thể thêm tối đa ' . $soConLai . ' sản phẩm nữa.'
            ], 400);
        }


        $giaBan = $bienthe->gia_moi !== null ? $bienthe->gia_moi : $bienthe->gia_cu;
        if (!$giaBan) {
            return response()->json(['message' => 'Sản phẩm chưa có giá.'], 400);
        }
        $bienthe->gia_ban = $giaBan; // Gán giá tạm để truyền qua Cart

        $newCart->AddCart($product, $bienthe, $quantity);
        $request->session()->put('cart', $newCart);

        return response()->json([
            'html' => view('clients.cart.cart-drop')->render(),
            'soLuongConLai' => $bienthe->so_luong - ($existingQty + $quantity)
        ]);
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
                        // $totalPrice += $cart->products[$idbt]['quantity'] * $bienThe->gia_moi;
                        $giaBan = $bienThe->gia_moi !== null ? $bienThe->gia_moi : $bienThe->gia_cu;
                        $totalPrice += $cart->products[$idbt]['quantity'] * $giaBan;
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

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\Banner;
use App\Models\KhuyenMai;
use App\Models\DanhMuc;
use App\Models\BaiViet;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class TrangChuController extends Controller
{
    public function index()
    {
        $bannersHeas = Banner::where('vi_tri', 'header')->where('trang_thai', 1)->get(); // w 420 h 350
        $bannersSides = Banner::latest('id')->where('vi_tri', 'sidebar')->where('trang_thai', 1)->limit(2)->get();
        $bannersFoots = Banner::where('vi_tri', 'footer')->where('trang_thai', 1)->get(); // w 420 h 350
        $danhMucs = DanhMuc::withCount('sanPhams')->get();
        $khuyenMais = KhuyenMai::where('trang_thai', 1)
            ->where('ngay_bat_dau', '<=', now())
            ->where('ngay_ket_thuc', '>=', now())
            ->orderBy('ngay_ket_thuc', 'asc')
            ->get();
        $hot15 = SanPham::limit(15)
            ->with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->where('is_hot', 1)
            ->get();
        if (count($hot15) > 0) {
            $products = $hot15->count() < 8 ? $hot15 : $hot15->random(8);
        } else {
            $products = SanPham::limit(8)
                ->with('bienTheSanPhams', 'hinhAnhSanPhams')
                ->orderBy('luot_xem', 'desc')
                ->get();
        }
        $allIdProducts = $products->pluck('id')->toArray();
        $new20 = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->whereNotIn('id', $allIdProducts)
            ->latest()
            ->limit(20)
            ->get();
        $newProducts = $new20->count() < 6 ? $new20 : $new20->random(6);
        $allIdNewProducts = $newProducts->pluck('id')->toArray();
<<<<<<< HEAD
        $randProducts = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams', 'danhMuc', 'danhGias')
            ->whereNotIn('id', $allIdProducts)
            ->whereNotIn('id', $allIdNewProducts)
=======
        $randProducts = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')
>>>>>>> 5fe3d4b2157d611a4974347a645aa045a56d16f9
            ->inRandomOrder()
            ->limit(4)
            ->get();

<<<<<<< HEAD
        if ($randProducts->isEmpty()) {
            // fallback: lấy ngẫu nhiên bất kỳ 4 sản phẩm khác
            $randProducts = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams', 'danhMuc', 'danhGias')
                ->inRandomOrder()
                ->limit(4)
                ->get();
        }
=======
>>>>>>> 5fe3d4b2157d611a4974347a645aa045a56d16f9
        if (Auth::user()) {
            $isLoved = [];
            $isLoved2 = [];
            $isLoved3 = [];
            $yeuThichs = Auth::user()->sanPhamYeuThichs()->pluck('san_pham_id')->toArray();
            foreach ($products as $product) {
                $isLoved[$product->id] = in_array($product->id, $yeuThichs);
            }
            foreach ($newProducts as $newProduct) {
                $isLoved2[$newProduct->id] = in_array($newProduct->id, $yeuThichs);
            }
            foreach ($randProducts as $randProduct) {
                $isLoved3[$randProduct->id] = in_array($randProduct->id, $yeuThichs);
            }
        } else {
            $isLoved = [];
            $isLoved2 = [];
            $isLoved3 = [];
        }
        $baiViets = BaiViet::where('trang_thai', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('clients.trangchu', compact('bannersHeas', 'bannersSides', 'bannersFoots', 'danhMucs', 'khuyenMais', 'products', 'newProducts', 'randProducts', 'baiViets'));
    }
}

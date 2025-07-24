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
            ->where('loai_ma', 'cong_khai')
            ->where('ngay_bat_dau', '<=', Carbon::now())
            ->where('ngay_ket_thuc', '>=', Carbon::now())
            ->orderBy('ngay_ket_thuc', 'asc')
            ->limit(10)->get();
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
        $randProducts = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')
            ->inRandomOrder()
            ->limit(4)
            ->get();

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
<<<<<<< Updated upstream
=======
        
        // Lấy 8 sản phẩm nổi bật theo đánh giá trung bình, nếu không đủ thì lấy theo lượt xem
        $products = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams', 'danhMuc', 'danhGias')
            ->whereHas('danhGias') // Chỉ lấy sản phẩm có đánh giá
            ->withAvg('danhGias', 'diem_so')
            ->orderByDesc('danh_gias_avg_diem_so')
            ->take(8)
            ->get();

        $countRated = $products->count();
        if ($countRated < 8) {
            // Lấy thêm sản phẩm theo lượt xem (không trùng id)
            $moreProducts = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams', 'danhMuc', 'danhGias')
                ->whereNotIn('id', $products->pluck('id'))
                ->orderByDesc('luot_xem')
                ->take(8 - $countRated)
                ->get();
            $products = $products->concat($moreProducts);
        }
>>>>>>> Stashed changes

        return view('clients.trangchu', compact('bannersHeas', 'bannersSides', 'bannersFoots', 'danhMucs', 'khuyenMais', 'products', 'newProducts', 'randProducts', 'baiViets'));
    }
}

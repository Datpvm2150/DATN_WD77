<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGiaSanPham;
use App\Models\DanhMuc;
use App\Models\DungLuong;
use App\Models\HinhAnhSanPham;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\TagSanPham;
use App\Models\BienTheSanPham;
use App\Models\YeuThich;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChiTietSanPhamController extends Controller
{
    public function index()
    {
        return view('clients.chitietsanpham');
    }

    public function show(string $id)
    {
        $sanpham = SanPham::find($id);
        if (!$sanpham) {
            return abort(404, 'Sản phẩm không tồn tại');
        }
      $anh_chinh = $sanpham->anh_san_pham;
        // Tăng lượt xem
        $sanpham->increment('luot_xem');

        // Lấy đánh giá (không lấy tra_lois vì chưa có bảng)
        $danhgias = DanhGiaSanPham::with('user')
            ->where('san_pham_id', $id)
            ->get();
        // Các dữ liệu liên quan sản phẩm
        $tagsanphams = TagSanPham::where('san_pham_id', $id)->get();
        // $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id', $id)->get();
        $bienthesanphams = BienTheSanPham::withTrashed()
    ->with(['dungLuong', 'mauSac'])
    ->where('san_pham_id', $id)
    ->get();
        $bienThes = BienTheSanPham::where('san_pham_id', $sanpham->id)->get();
        $tongSoLuong = $bienThes->sum('so_luong');
        $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->get();
//  $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->orderBy('id')->get();

        $mauSacIds = $bienthesanphams->pluck('mau_sac_id')->unique();
        $mauSacs = MauSac::whereIn('id', $mauSacIds)->where('trang_thai', 1)->get();

        $dungLuongIds = $bienthesanphams->pluck('dung_luong_id')->unique();
        $dungLuongs = DungLuong::whereIn('id', $dungLuongIds)->get();

        $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
        $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count();

        $danhMucs = DanhMuc::withCount('sanPhams')->get();
        $hasReview = DanhGiaSanPham::where('san_pham_id', $id)->exists();

        $starCounts = DanhGiaSanPham::select(DB::raw('diem_so, count(*) as count'))
            ->where('san_pham_id', $id)
            ->groupBy('diem_so')
            ->pluck('count', 'diem_so');

        $tongDanhGia = $starCounts->sum();
        $phanTramSao = [];
        for ($i = 1; $i <= 5; $i++) {
            $phantram = $tongDanhGia > 0 ? ($starCounts->get($i, 0) / $tongDanhGia) * 100 : 0;
            $phanTramSao[$i] = $phantram;
        }

        $sanPhamMoiNhat = SanPham::latest()->take(5)->with('bienthesanphams', 'danhMuc')->get();

        $isLoved = [];
        $products = [];

        if (Auth::user()) {
            $products = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')->get();
            $yeuThichs = Auth::user()->sanPhamYeuThichs()->pluck('san_pham_id')->toArray();
            foreach ($products as $product) {
                $isLoved[$product->id] = in_array($product->id, $yeuThichs);
            }
        }

foreach ($products as $product) {
    $loveCount[$product->id] = $product->yeuThichs->count();
}



        return view('clients.chitietsanpham', compact(
            'danhMucs',
            'sanpham',
            'anh_chinh',
            'bienthesanphams',
            'anhsanphams',
            'tagsanphams',
            'mauSacs',
            'dungLuongs',
            'danhgias',
            'diemtrungbinh',
            'soluotdanhgia',
            'phanTramSao',
            'sanPhamMoiNhat',
            'products',
            'isLoved',
            'hasReview',
            'tongSoLuong'
        ));
    }

    public function layGiaBienThe(Request $request)
    {
        $sanPhamId = $request->input('san_pham_id');
        $mauSacId = $request->input('mau_sac_id');
        $dungLuongId = $request->input('dung_luong_id');

        $bienThe = BienTheSanPham::where('san_pham_id', $sanPhamId)
            ->where('mau_sac_id', $mauSacId)
            ->where('dung_luong_id', $dungLuongId)
            ->first();

        if ($bienThe && $bienThe->so_luong > 0) {
            $gia_moi =  $bienThe->gia_moi ?? $bienThe->gia_cu;
            return response()->json([
                'status' => 'success',
                'gia_moi' => $bienThe->gia_moi,
                'gia_cu' => $bienThe->gia_cu,
                'so_luong'  => $bienThe->so_luong

            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy biến thể sản phẩm hoặc hết hàng.'
            ]);
        }
    }

    public function getSoLuongBienThe(Request $request)
    {
        $sanPhamId = $request->input('san_pham_id');
        $mauSacId = $request->input('mau_sac_id');
        $dungLuongId = $request->input('dung_luong_id');

        $bienThe = BienTheSanPham::where('san_pham_id', $sanPhamId)
            ->where('mau_sac_id', $mauSacId)
            ->where('dung_luong_id', $dungLuongId)
            ->first();

        if ($bienThe) {
            return response()->json([
                'status' => 'success',
                'so_luong' => $bienThe->so_luong
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Không tìm thấy biến thể sản phẩm'
            ]);
        }
    }



public function getAllVariants(Request $request)
{
    $sanPhamId = $request->input('san_pham_id');
    $variants = BienTheSanPham::where('san_pham_id', $sanPhamId)
        ->select('mau_sac_id', 'dung_luong_id')
        ->get();

    return response()->json($variants);
}


}

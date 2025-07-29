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
use App\Models\TraLoi;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
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
        if ($sanpham) {
            $sanpham->increment('luot_xem');
            $anh_chinh = $sanpham->anh_san_pham;

            // Lấy danh sách đánh giá và thêm biến thể đã mua cho từng người dùng
            $danhgias = DanhGiaSanPham::with(['user', 'traLois.user'])
                ->where('san_pham_id', $id)
                ->get()
                ->map(function ($danhgia) use ($id) {
                    $hoaDonIds = HoaDon::where('user_id', $danhgia->user_id)
                        ->where('trang_thai', 7) // Trạng thái = 7 (hoàn thành)
                        ->pluck('id');

                    $bienTheIds = ChiTietHoaDon::whereIn('hoa_don_id', $hoaDonIds)
                        ->whereHas('bienTheSanPham', function ($query) use ($id) {
                            $query->where('san_pham_id', $id);
                        })
                        ->pluck('bien_the_san_pham_id');

                    $danhgia->bienTheDaMua = BienTheSanPham::whereIn('id', $bienTheIds)
                        ->with(['mauSac', 'dungLuong'])
                        ->get();

                    return $danhgia;
                });

            // Các dữ liệu khác
            $tagsanphams = TagSanPham::where('san_pham_id', $id)->get();
            $bienThes = BienTheSanPham::where('san_pham_id', $sanpham->id)->get();
            $tongSoLuong = $bienThes->sum('so_luong');
            $bienthesanphams = BienTheSanPham::withTrashed()
                ->with(['dungLuong', 'mauSac'])
                ->where('san_pham_id', $id)
                ->get();
            $anhsanphams = HinhAnhSanPham::where('san_pham_id', $id)->get();

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
                $isLoved = [];
                $products = SanPham::with('bienTheSanPhams', 'hinhAnhSanPhams')->get();
                $yeuThichs = Auth::user()->sanPhamYeuThichs()->pluck('san_pham_id')->toArray();
                foreach ($products as $product) {
                    $isLoved[$product->id] = in_array($product->id, $yeuThichs);
                }
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
    }

    public function layGiaBienThe(Request $request)
    {
        $sanPhamId = $request->input('san_pham_id');
        $mauSacId = $request->input('mau_sac_id');
        $dungLuongId = $request->input('dung_luong_id');

        // Lấy thông tin biến thể sản phẩm từ cơ sở dữ liệu
        $bienThe = BienTheSanPham::where('san_pham_id', $sanPhamId)
            ->where('mau_sac_id', $mauSacId)
            ->where('dung_luong_id', $dungLuongId)
            ->first();

        if ($bienThe && $bienThe->so_luong > 0) {  // Kiểm tra nếu có tồn kho
            $gia_moi =  $bienThe->gia_moi ?? $bienThe->gia_cu;
            return response()->json([
                'status' => 'success',
                'gia_moi' => $gia_moi,
                'gia_cu' => $bienThe->gia_cu,
                'so_luong'  => $bienThe->so_luong,
                'bien_the_id' => $bienThe->id,
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

        // Lấy biến thể từ cơ sở dữ liệu dựa trên các tham số
        $bienThe = BienTheSanPham::where('san_pham_id', $sanPhamId)
            ->where('mau_sac_id', $mauSacId)
            ->where('dung_luong_id', $dungLuongId)
            ->first();

        // Kiểm tra nếu biến thể tồn tại và trả về số lượng còn lại
        if ($bienThe) {
            return response()->json([
                'status' => 'success',
                'so_luong' => $bienThe->so_luong // Trả về số lượng còn lại
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
            ->select('id', 'mau_sac_id', 'dung_luong_id', 'gia_moi', 'gia_cu', 'so_luong')
            ->get();

        return response()->json($variants);
    }

    public function reply(Request $request, $id)
    {
        // Kiểm tra xem người dùng có phải là admin không
        if (Auth::user()->vai_tro === 'user') {
            return redirect()->route('chitietsanpham')->with('error', 'Bạn không có quyền trả lời đánh giá!');
        }

        // Lấy đánh giá cần trả lời
        $danhGia = DanhGiaSanPham::findOrFail($id);

        // Tạo một bản ghi trả lời
        TraLoi::create([
            'danh_gia_id' => $danhGia->id,
            'user_id' => Auth::id(),
            'noi_dung' => $request->input('reply'),
        ]);

        // Sau khi trả lời đánh giá, chuyển hướng về trang chi tiết sản phẩm
        return redirect()->route('chitietsanpham', ['id' => $danhGia->san_pham_id])->with('success', 'Trả lời đánh giá thành công!');
    }
    public function editReply(Request $request, TraLoi $traLoi)
    {
        // Kiểm tra quyền chỉnh sửa (chỉ chủ sở hữu hoặc admin mới có thể chỉnh sửa)
        if (Auth::user()->id !== $traLoi->user_id && Auth::user()->vai_tro !== 'admin') {
            return redirect()->route('chitietsanpham.index')->with('error', 'Bạn không có quyền sửa câu trả lời này.');
        }

        // Validate nội dung trả lời
        $request->validate([
            'reply' => 'required|string|max:1000',
        ]);

        // Cập nhật nội dung trả lời
        $traLoi->noi_dung = $request->input('reply');
        $traLoi->save();

        // Lấy ID sản phẩm từ đánh giá liên quan
        $sanPhamId = $traLoi->danhGiaSanPham->san_pham_id;

        // Redirect về chi tiết sản phẩm sau khi sửa
        return redirect()->route('chitietsanpham', ['id' => $sanPhamId])->with('success', 'Câu trả lời đã được cập nhật!');
    }
}

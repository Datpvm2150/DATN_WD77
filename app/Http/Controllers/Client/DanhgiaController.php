<?php 

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhGiaSanPham;
use Illuminate\Http\Request;
use App\Models\ChiTietHoaDon;

class DanhgiaController extends Controller
{ public function checkReviewEligibility(Request $request, $san_pham_id)
    {
        // Xác thực nếu cần (nếu $san_pham_id luôn được truyền từ route thì không cần validate lại)
        $sanPhamId = $san_pham_id;
        $userId = $request->query('user_id') ?? auth()->id();
    
        // Tính toán số lần mua sản phẩm với điều kiện hóa đơn có trạng thái 7
        $soLanMua = ChiTietHoaDon::whereHas('bienTheSanPham', function ($query) use ($sanPhamId) {
                $query->where('san_pham_id', $sanPhamId);
            })
            ->whereHas('hoaDon', function ($query) use ($userId) {
                $query->where('user_id', $userId)
                      ->where('trang_thai', 7); // Chỉ xét hóa đơn có trạng thái 7
            })
            ->sum('so_luong');
    
        // Tính toán số lần đã đánh giá
        $soLanDanhGia = DanhGiaSanPham::where('san_pham_id', $sanPhamId)
            ->where('user_id', $userId)
            ->count();
    
        // Tính số lần đánh giá còn lại
        $remainingReviews = $soLanMua - $soLanDanhGia;
    
        // Trả về phản hồi dưới dạng JSON
        return response()->json([
            'san_pham_id' => $sanPhamId,
            'user_id' => $userId,
            'eligible' => $remainingReviews > 0,
            'remainingReviews' => max($remainingReviews, 0),
        ]);
    }
    

    public function getReviews($san_pham_id)
    {
        $reviews = DanhGiaSanPham::with('user:id,ten')
            ->where('san_pham_id', $san_pham_id)
            ->latest()
            ->get();

        return response()->json($reviews);
    }

    public function storeReview(Request $request)
{
    $validated = $request->validate([
        'san_pham_id' => 'required|exists:san_phams,id',
        'hoa_don_id' => 'required|exists:hoa_dons,id',
        'chi_tiet_hoa_don_id' => 'required|exists:chi_tiet_hoa_dons,id',
        'user_id' => 'required|exists:users,id',
        'diem_so' => 'required|integer|between:1,5',
        'nhan_xet' => 'nullable|string|max:1000',
    ]);

    $userId = $validated['user_id'];
    $sanPhamId = $validated['san_pham_id'];
    $hoaDonId = $validated['hoa_don_id'];
    $chiTietHoaDonId = $validated['chi_tiet_hoa_don_id'];
    
    // ✅ Bước 1: check chi tiết hóa đơn
    $chiTietHoaDon = ChiTietHoaDon::where('id', $chiTietHoaDonId)
        ->where('hoa_don_id', $hoaDonId)
        ->whereHas('hoaDon', function ($query) use ($userId) {
            $query->where('user_id', $userId)
                  ->where('trang_thai', 7);
        })
        ->whereHas('bienTheSanPham', function ($query) use ($sanPhamId) {
            $query->where('san_pham_id', $sanPhamId);
        })
        ->first();

    if (!$chiTietHoaDon) {
        return response()->json([
            'error' => 'Không tìm thấy chi tiết hóa đơn hợp lệ.',
            'debug' => [
                'hoa_don_id' => $hoaDonId,
                'chi_tiet_hoa_don_id' => $chiTietHoaDonId,
                'san_pham_id' => $sanPhamId,
                'user_id' => $userId,
            ]
        ], 403);
    }

    // ✅ Bước 2: check trùng đánh giá
    $daDanhGia = DanhGiaSanPham::where('san_pham_id', $sanPhamId)
        ->where('user_id', $userId)
        ->where('hoa_don_id', $hoaDonId)
        ->exists();

    if ($daDanhGia) {
        return response()->json([
            'error' => 'Bạn đã đánh giá sản phẩm này cho đơn hàng này rồi.'
        ], 403);
    }

    // ✅ Bước 3: Lưu đánh giá
    $review = DanhGiaSanPham::create([
        'san_pham_id' => $sanPhamId,
        'hoa_don_id' => $hoaDonId,
        'chi_tiet_hoa_don_id' => $chiTietHoaDonId,
        'user_id' => $userId,
        'diem_so' => $validated['diem_so'],
        'nhan_xet' => $validated['nhan_xet'] ?? null,
    ]);

    if (!$review) {
        return response()->json(['error' => 'Không thể lưu đánh giá.'], 500);
    }

    return response()->json($review, 201);
}


}
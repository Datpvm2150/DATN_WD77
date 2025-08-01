<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiemDanh;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DiemDanhController extends Controller
{
    public function diemDanh(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today()->toDateString();

        // Kiểm tra đã điểm danh hôm nay chưa
        $exists = DiemDanh::where('user_id', $user->id)->where('ngay', $today)->exists();
        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => 'Bạn đã điểm danh hôm nay rồi!',
                'diem' => $user->fresh()->diem_tich_luy
            ]);
        }

        // Thêm điểm danh
        DiemDanh::create([
            'user_id' => $user->id,
            'ngay' => $today,
            'diem' => 10
        ]);

        // Cộng điểm cho user
        $user->increment('diem_tich_luy', 10);

        // Lấy lại điểm mới nhất
        $user->refresh();

        return response()->json([
            'success' => true,
            'message' => '+10 điểm tích lũy!',
            'diem' => $user->diem_tich_luy
        ]);
    }
}

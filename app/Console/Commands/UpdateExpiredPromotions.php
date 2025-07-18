<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\KhuyenMai;
use Carbon\Carbon;

class UpdateExpiredPromotions extends Command
{
    protected $signature = 'promotions:update-expired';
    protected $description = 'Cập nhật trạng thái của các khuyến mãi đã hết hạn';

    public function handle()
    {
        $now = Carbon::now();

        // Cập nhật trạng thái của các khuyến mãi đã hết hạn
        $updatedCount = KhuyenMai::where('ngay_ket_thuc', '<', $now)
            ->where('trang_thai', true) // Chỉ cập nhật nếu trạng thái là đang hoạt động
            ->update(['trang_thai' => false]);

        // Cập nhật trạng thái KH đã sử dụng hết số lượng
        $usedUpCount = KhuyenMai::where(function ($query) {
                $query->whereColumn('da_su_dung', '>=', 'so_luong')
                      ->orWhereNull('so_luong'); // Xử lý trường hợp so_luong là NULL
            })
            ->where('trang_thai', true)
            ->update(['trang_thai' => false]);
    }
}

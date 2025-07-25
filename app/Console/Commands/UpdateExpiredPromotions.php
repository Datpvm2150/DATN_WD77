<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\KhuyenMai;
use Carbon\Carbon;

class UpdateExpiredPromotions extends Command
{
    protected $signature = 'promotions:update-expired';
    protected $description = 'Cập nhật trạng thái của các khuyến mãi đã hết hạn hoặc đã sử dụng hết số lượng';

    public function handle()
    {
        $now = Carbon::now();

        // 1. Cập nhật các khuyến mãi đã hết hạn theo ngày
        $expiredByDateCount = KhuyenMai::where('ngay_ket_thuc', '<', $now)
            ->where('trang_thai', true)
            ->update(['trang_thai' => false]);

        // 2. Cập nhật các khuyến mãi đã sử dụng hết số lượng (chỉ áp dụng nếu có giới hạn số lượng)
        $usedUpCount = KhuyenMai::whereColumn('da_su_dung', '>=', 'so_luong')
            ->whereNotNull('so_luong')
            ->where('trang_thai', true)
            ->update(['trang_thai' => false]);

        $totalUpdated = $expiredByDateCount + $usedUpCount;

        // Hiển thị thông báo trong terminal
        $this->info("Đã cập nhật $totalUpdated khuyến mãi. ($expiredByDateCount hết hạn theo ngày, $usedUpCount hết lượt sử dụng)");
    }
}

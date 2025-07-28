<?php

namespace App\Console\Commands;
use App\Models\HoaDon;
use Illuminate\Console\Command;
use Carbon\Carbon;

class AutoConfirmOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:auto-confirm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tự động xác nhận đơn hàng sau 1 ngày sau';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orders = HoaDon::where('trang_thai', '5')
            ->where('updated_at', '<=', Carbon::now()->subMinutes(1))
            ->get();

        foreach ($orders as $order) {
            $order->update(['trang_thai' => '7']);
            $this->info("Đã xác nhận đơn hàng: {$order->id}");
        }

        return Command::SUCCESS;
    }
}

<?php

namespace App\Observers;

use App\Events\OrderCreated;
use App\Events\OrderUpdated;
use App\Events\OrderCancelled;
use App\Models\HoaDon;

class HoaDonObserver
{
    /**
     * Handle the HoaDon "created" event.
     */
    public function created(HoaDon $hoaDon): void
    {
        // Broadcast order created event
        broadcast(new OrderCreated($hoaDon))->toOthers();
    }

    /**
     * Handle the HoaDon "updated" event.
     */
    public function updated(HoaDon $hoaDon): void
    {
        // Lấy các thay đổi
        $changes = $hoaDon->getChanges();

        // Nếu trạng thái chuyển sang HỦY
        if (isset($changes['trang_thai']) && $changes['trang_thai'] == HoaDon::HUY_DON_HANG) {
            broadcast(new OrderCancelled($hoaDon, $hoaDon->ly_do_huy ?? null))->toOthers();
        } else {
            // Broadcast cập nhật đơn hàng
            broadcast(new OrderUpdated($hoaDon, $changes))->toOthers();
        }
    }

    /**
     * Handle the HoaDon "deleted" event.
     */
    public function deleted(HoaDon $hoaDon): void
    {
        // Nếu đơn chưa ở trạng thái HỦY thì coi việc xóa là hủy
        if ($hoaDon->trang_thai != HoaDon::HUY_DON_HANG) {
            broadcast(new OrderCancelled($hoaDon, 'Đơn hàng đã bị xóa'))->toOthers();
        }
    }
    /**
     * Handle the HoaDon "restored" event.
     */
    public function restored(HoaDon $hoaDon): void
    {
        //
    }

    /**
     * Handle the HoaDon "force deleted" event.
     */
    public function forceDeleted(HoaDon $hoaDon): void
    {
        //
    }
}

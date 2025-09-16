<?php

namespace App\Events;

use App\Models\HoaDon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCancelled implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $reason;

    /**
     * Create a new event instance.
     */
    public function __construct(HoaDon $order, $reason = null)
    {
        $this->order = $order;
        $this->reason = $reason;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('orders'),
        ];
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'order.cancelled';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'id' => $this->order->id,
            'ma_hoa_don' => $this->order->ma_hoa_don,
            'ngay_dat_hang' => $this->order->ngay_dat_hang,
            'tong_tien' => $this->order->tong_tien,
            'phuong_thuc_thanh_toan' => $this->order->phuong_thuc_thanh_toan,
            'trang_thai' => $this->order->trang_thai,
            'trang_thai_thanh_toan' => $this->order->trang_thai_thanh_toan,
            'user_name' => $this->order->user->name ?? 'Khách hàng',
            'reason' => $this->reason,
            'cancelled_at' => $this->order->updated_at,
        ];
    }
}

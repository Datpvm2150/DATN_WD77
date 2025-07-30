<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $message;
    public $receiverId;
    public $unreadCount;

    public function __construct(Message $message)
    {
        $this->message = $message->load(['chatRoom', 'sender']);

        $this->receiverId = $this->message->sender_id === $this->message->chatRoom->customer_id
            ? $this->message->chatRoom->staff_id
            : $this->message->chatRoom->customer_id;

        $this->unreadCount = Message::whereHas('chatRoom', function ($query) {
            $query->where('customer_id', $this->receiverId)
                ->orWhere('staff_id', $this->receiverId);
        })
            ->where('sender_id', '!=', $this->receiverId)
            ->where('is_read', false)
            ->count();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('conversation.' . $this->message->chat_room_id),
            new PrivateChannel('user.' . $this->receiverId),
        ];
    }

    public function broadcastAs()
    {
        return 'SendMessage'; // tên sự kiện khi JS lắng nghe
    }
}

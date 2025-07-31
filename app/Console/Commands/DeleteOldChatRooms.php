<?php

namespace App\Console\Commands;

use App\Models\ChatRoom;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldChatRooms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-chat-rooms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoff = Carbon::now()->subMinutes(30);

        $expiredRooms = ChatRoom::whereHas('messages', function ($query) use ($cutoff) {
            $query->select('chat_room_id')
                ->groupBy('chat_room_id')
                ->havingRaw('MAX(created_at) < ?', [$cutoff]);
        })->get();

        foreach ($expiredRooms as $room) {
            $room->delete();
        }

        $this->info('Đã xoá ' . $expiredRooms->count() . ' phòng chat cũ.');
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

        $chatRoom = ChatRoom::where(
            'customer_id',
            $user->id
        )->first();
        if (!$chatRoom || !$chatRoom->staff->is_online) {
            $newStaff = User::whereIn('vai_tro', ['staff', 'admin'])
                ->where('is_online', true)
                ->withCount('staffChatRooms')
                ->orderBy('staff_chat_rooms_count', 'asc')
                ->first();
            if (!$newStaff) {
                return response()->json([
                    'status' => 'offline',
                    'message' => 'Hiện không có nhân viên nào online.',
                ]);
            }

            if (!$chatRoom) {
                $chatRoom = ChatRoom::create([
                    'customer_id' => $user->id,
                    'staff_id' => $newStaff->id,
                ]);
            } else {
                $chatRoom->staff_id = $newStaff->id;
                $chatRoom->save();
            }
        }


        $message = $request->input('message');
        $file = $request->file('file');
        if ($message && $file) {
            $message = Message::create([
                'chat_room_id' => $chatRoom->id,
                'sender_id' => $user->id,
                'message' => $message,
                'type' => 'text'
            ]);
            broadcast(new \App\Events\SendMessage($message));

            $message = Message::create([
                'chat_room_id' => $chatRoom->id,
                'sender_id' => $user->id,
                'message' => $file->store('images', 'public'),
                'type' => 'file'
            ]);
            broadcast(new \App\Events\SendMessage($message));

            return response()->json([
            'status' => 'success',
            'response' => $message,
        ]);
        }

        if ($message && !$file) {
            $message = Message::create([
                'chat_room_id' => $chatRoom->id,
                'sender_id' => $user->id,
                'message' => $message,
                'type' => 'text'
            ]);
        }

        if (!$message && $file) {
            $message = Message::create([
                'chat_room_id' => $chatRoom->id,
                'sender_id' => $user->id,
                'message' => $file->store('images', 'public'),
                'type' => 'file'
            ]);
        }

        broadcast(new \App\Events\SendMessage($message));

        // For now, just return a simple response
        return response()->json([
            'status' => 'success',
            'response' => $message,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        // Validate the request


        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $chatRoom = ChatRoom::where(
            'customer_id', $user->id)->first();

        if (!$chatRoom) {
            $chatRoom = ChatRoom::create([
                'customer_id' => $user->id,
                'staff_id' => User::where('vai_tro', 'staff')->orWhere('vai_tro', 'admin')->first()->id,
            ]);
        }

        // Process the message (this is where you would handle the chat logic)
        $message = $request->input('message');

        $message = Message::create([
            'chat_room_id' => $chatRoom->id,
            'sender_id' => $user->id,
            'message' => $message,
        ]);

        broadcast(new \App\Events\SendMessage($message));
        // For now, just return a simple response
        return response()->json([
            'status' => 'success',
            'response' => $message,
        ]);
    }
}

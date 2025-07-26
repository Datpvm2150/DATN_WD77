<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chatRooms = ChatRoom::where('staff_id', Auth::id())->with('customer')->get();
        return view('admins.chat.index', compact('chatRooms'));
    }

    public function show($id)
    {
        $chatRoom = ChatRoom::with(['messages', 'customer', 'staff'])->findOrFail($id);
        return response()->json([
            'chatRoom' => $chatRoom,
            'messages' => $chatRoom->messages,
            'customer' => $chatRoom->customer,
            'staff' => $chatRoom->staff,
        ]);
    }

    public function send(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $chatRoom = ChatRoom::findOrFail($id);
        $message = $chatRoom->messages()->create([
            'sender_id' => Auth::id(),
            'message' => $request->input('message'),
        ]);

        broadcast(new \App\Events\SendMessage($message));

        return response()->json(['message' => $message]);
    }
}

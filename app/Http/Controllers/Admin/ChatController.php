<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chatRooms = ChatRoom::with(['customer'])
            ->withCount(['messages as unread_count' => function ($q) {
                $q->where('is_read', false)->where('sender_id', '!=', Auth::id());
            }])
            ->get();
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
            'message' => 'nullable|string|max:500',
        ]);

        $chatRoom = ChatRoom::findOrFail($id);

        if ($request->message && $request->image) {
            $message = $chatRoom->messages()->create([
                'sender_id' => Auth::id(),
                'message' => $request->input('message'),
                'type' => 'text'
            ]);
            broadcast(new \App\Events\SendMessage($message));
            $message = $chatRoom->messages()->create([
                'sender_id' => Auth::id(),
                'message' => $request->file('image')->store('images', 'public'),
                'type' => 'file'
            ]);
            broadcast(new \App\Events\SendMessage($message));
        }
        if (!$request->message && $request->image) {
            $message = $chatRoom->messages()->create([
                'sender_id' => Auth::id(),
                'message' => $request->file('image')->store('images', 'public'),
                'type' => 'file'
            ]);
            broadcast(new \App\Events\SendMessage($message));
        }
        if ($request->message && !$request->image) {
            $message = $chatRoom->messages()->create([
                'sender_id' => Auth::id(),
                'message' => $request->input('message'),
                'type' => 'text'
            ]);
            broadcast(new \App\Events\SendMessage($message));
        }



        return response()->json([
            'messages' => $chatRoom->messages()
                ->where('sender_id', Auth::id())
                ->latest()
                ->take($request->message && $request->image ? 2 : 1)
                ->get()
                ->reverse() // để đảm bảo thứ tự: text trước, ảnh sau
                ->values()
        ]);
    }
    public function markMessagesAsRead(ChatRoom $room)
    {
        $room->messages()
            ->where('sender_id', '!=', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $unreadCount = Message::whereHas('chatRoom', function ($query) {
            $query->where('customer_id', Auth::id())
                ->orWhere('staff_id', Auth::id());
        })
            ->where('sender_id', '!=', Auth::id())
            ->where('is_read', false)
            ->count();

        return response()->json([
            'success' => true,
            'unread_count' => $unreadCount,
        ]);
    }
}

<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('conversation.{chatRoomId}', function ($user, $chatRoomId) {
    // return $user->chatRooms()->where('id', $chatRoomId)->exists();
    return true;
});

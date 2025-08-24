<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('conversation.{chatRoomId}', function ($user, $chatRoomId) {
    return true;
});
Broadcast::channel('staff-presence', function ($user) {
     if(in_array($user->vai_tro, ['staff', 'admin'])) {
        return [
        'id' => $user->id,
        'name' => $user->ten,
    ];
     };
     return false;
});

Broadcast::channel('user.{userId}', function ($user, $userId) {
    return $user->id === (int) $userId;
});

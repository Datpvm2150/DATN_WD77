<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    // Mỗi phiên chat thuộc về 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mỗi phiên chat có nhiều tin nhắn
    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatLog;

class ChatLogController extends Controller
{
    public function index()
    {
        $logs = ChatLog::latest()->paginate(20);
        return view('admins.chat_logs.index', compact('logs'));
    }
}

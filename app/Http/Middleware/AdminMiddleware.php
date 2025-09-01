<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        
        
        // Nếu chưa đăng nhập
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

        // Nếu đã đăng nhập nhưng không phải admin
        if (Auth::user()->vai_tro !== 'admin') {
            Auth::logout(); // đăng xuất user không phải admin
            return redirect()->route('admin.login')->with('error', 'Bạn không có quyền truy cập trang quản trị.');
        }

        return $next($request);
    }
}
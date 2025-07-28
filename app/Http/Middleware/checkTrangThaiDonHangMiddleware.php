<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;
use App\Models\HoaDon;

class checkTrangThaiDonHangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $orders = HoaDon::where('trang_thai', '5')
        ->where('updated_at', '<=', Carbon::now()->subMinutes(1)) // sau 1 phút
        ->where('updated_at', '>=', Carbon::now()->subDays(1)) // sau 1 ngày
        ->get();

    foreach ($orders as $order) {
        $order->update(['trang_thai' => '7']);
    }
        return $next($request);
    }
}

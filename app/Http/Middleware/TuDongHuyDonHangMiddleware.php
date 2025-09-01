<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;
use App\Models\HoaDon;

class TuDongHuyDonHangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $orders = HoaDon::where('phuong_thuc_thanh_toan', 'Thanh toán qua chuyển khoản ngân hàng')
         ->where('thoi_gian_het_han', '<=', now())
         ->where('trang_thai', 1)
        ->get();
        foreach ($orders as $order) {
            $order->update(['trang_thai' => 6]);
        }
        return $next($request);
    }
}

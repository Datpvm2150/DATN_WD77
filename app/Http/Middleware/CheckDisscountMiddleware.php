<?php

namespace App\Http\Middleware;

use App\Models\KhuyenMai;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDisscountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now();

        // Chỉ cập nhật những mã đang còn hiệu lực (trang_thai = true)
        KhuyenMai::where('trang_thai', true)
            ->where('ngay_ket_thuc', '<', $now)
            ->update(['trang_thai' => false]);

        return $next($request);
    }
}

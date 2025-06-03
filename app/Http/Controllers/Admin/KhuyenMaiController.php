<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KhuyenMai;

class KhuyenMaiController extends Controller
{
    public function index(Request $request) {
        $query = KhuyenMai::query();
       if($request->has('ngay_bat_dau') && $request->input('ngay_bat_dau')) {
        $query->where('ngay_bat_dau', '>=', $request->input('ngay_bat_dau'));
       }
       if($request->has('ngay_ket_thuc') && $request->input('ngay_ket_thuc')) {
        $query->where('ngay_ket_thuc', '<=', $request->input('ngay_ket_thuc'));
       }

       $khuyenMais = $query->get();
        return view('admins.khuyen_mais.index', compact('khuyenMais'));
    }
}

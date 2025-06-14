<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class YeuThichController extends Controller
{
    public function index(){

        return view('clients.yeuthich');

    }

    public function showYeuThich(Request $request)
    {
        $danhMucs = DanhMuc::get();
        return view('clients.yeuthich', compact('danhMucs'));
    }
    // public function addToLove(Request $request, string $id)
    // {
    //     $product = SanPham::findOrFail($id);
    //     $userId = $request->user()->id; // Bạn có thể thay bằng $request->user()->id khi có đăng nhập
    //     Log::info('add to love: ', ['user_id' => $userId, 'product_id' => $id]);
    //     if ($product->users()->where('user_id', $userId)->exists()) {
    //         $product->users()->detach($userId);
    //         return Auth::user()->sanPhamYeuThichs()->count();
    //     } else {
    //         $product->users()->attach($userId);
    //         return Auth::user()->sanPhamYeuThichs()->count();
    //     }
    // }
public function addToLove(Request $request, string $id)
{
    $product = SanPham::findOrFail($id);
    $userId = 1; // Giả định user đang sử dụng có ID là 1 (demo)

    Log::info('add to love: ', ['user_id' => $userId, 'product_id' => $id]);

    if ($product->users()->where('user_id', $userId)->exists()) {
        $product->users()->detach($userId);
        return $product->users()->count(); // trả về số lượt yêu thích
    } else {
        $product->users()->attach($userId);
        return $product->users()->count();
    }
}

    // public function deleteLove(Request $request, string $id)
    // {
    //     $product = SanPham::findOrFail($id);
    //     $userId = $request->user()->id;
    //     $danhMucs = DanhMuc::get();
    //     if ($product->users()->where('user_id', $userId)->exists()) {
    //         $product->users()->detach($userId);
    //         Auth::user()->sanPhamYeuThichs();
    //         return view('clients.loved.loved-list', compact('danhMucs'));
    //     }
    // }
public function deleteLove(Request $request, string $id)
{
    $product = SanPham::findOrFail($id);
    $userId = 1;
    $danhMucs = DanhMuc::get();

    if ($product->users()->where('user_id', $userId)->exists()) {
        $product->users()->detach($userId);
    }

    return view('clients.loved.loved-list', compact('danhMucs'));
}
public function lovedList()
{
    $userId = 1;
    $user = \App\Models\User::find($userId);
    return $user->sanPhamYeuThichs()->count();
}


    // public function lovedList(){
    //     return Auth::user()->sanPhamYeuThichs()->count();
    // }
}

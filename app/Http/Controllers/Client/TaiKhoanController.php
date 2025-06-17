<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon;
use App\Models\lien_hes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaiKhoanController extends Controller
{

    public function profileUser()
    {
        return view('clients.taikhoan.profile');
    }
}

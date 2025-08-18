<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;

    protected $fillable = [
        'bien_the_san_pham_id',
        'hoa_don_id',
        'ten_san_pham',
        'ten_dung_luong',
        'ten_mau_sac',
        'so_luong',
        'don_gia',
        'thanh_tien'
    ];

    public function bienTheSanPham()
    {
        return $this->belongsTo(BienTheSanPham::class);
    }

    public function hoaDon() 
    {
        return $this->belongsTo(HoaDon::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhuyenMai extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ma_khuyen_mai',
        'phan_tram_khuyen_mai',
        'ngay_bat_dau',
        'giam_toi_da',
        'ngay_ket_thuc',
        'trang_thai'
    ];

    
}

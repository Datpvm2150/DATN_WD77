<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BienTheSanPham extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'bien_the_san_phams';
    protected $fillable =[
        'san_pham_id',
        'so_luong',
        'gia_cu',
        'gia_moi',
        'dung_luong_id',
        'mau_sac_id'
    ];

    public function sanPham(){
        return $this->belongsTo(SanPham::class);
    }
    public function dungLuong() {
        return $this->belongsTo(DungLuong::class);
    }
    public function mauSac() {
        return $this->belongsTo(MauSac::class);
    }
    public function danhGiaSanPham()
    {
        return $this->belongsTo(DanhGiaSanPham::class, 'san_pham_id', 'san_pham_id');
    }
    public function sanPhamnew(){
        return $this->belongsTo(SanPham::class,'san_pham_id');
    }
}

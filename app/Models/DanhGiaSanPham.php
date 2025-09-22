<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhGiaSanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'san_pham_id',
        'hoa_don_id',
        'chi_tiet_hoa_don_id',
        'diem_so',
        'nhan_xet',
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Quan hệ với Sản phẩm
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class)->withTrashed();;
    }

    // Quan hệ với trả lời đánh giá
    public function traLois()
    {
        return $this->hasMany(TraLoi::class, 'danh_gia_id');
    }
    public function bienTheSanPhams()
    {
        return $this->hasMany(BienTheSanPham::class, 'san_pham_id', 'san_pham_id');
    }

    // In the DanhGiaSanPham model
    public function replies()
    {
        return $this->hasMany(TraLoi::class, 'danh_gia_id');
    }
    // Define the relationship with BienTheSanPham
    public function bienTheSanPham()
    {
        return $this->belongsTo(BienTheSanPham::class, 'bien_the_san_pham_id');
    }
    // Quan hệ với chi tiết hóa đơn
    public function chiTietHoaDon()
    {
        return $this->belongsTo(ChiTietHoaDon::class, 'chi_tiet_hoa_don_id');
    }

    // Quan hệ với hóa đơn
    public function hoaDon()
    {
        return $this->belongsTo(HoaDon::class, 'hoa_don_id');
    }
}

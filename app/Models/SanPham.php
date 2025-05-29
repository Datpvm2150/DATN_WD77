<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='san_phams';
    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'danh_muc_id',
        'anh_san_pham',
        'mo_ta',
        'luot_xem',
        'da_ban'
    ];

    public function danhMuc(){
        return $this->belongsTo(DanhMuc::class);
    }

    public function hinhAnhSanPhams() {
        return $this->hasMany(HinhAnhSanPham::class);
    }

    public function bienTheSanPhams(){
        return $this->hasMany(BienTheSanPham::class);
    }
    public function Tags(){
        return $this->belongsToMany(Tag::class,'tag_san_phams','san_pham_id','tag_id');
    }
    public function tagSanPhams()
    {
        return $this->hasMany(TagSanPham::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $table ='tags';
    protected $fillable = [
        'ten_tag',
        'trang_thai'
    ];
    public function tagSanPhams(){
        return $this->hasMany(TagSanPham::class);
    }
    // Quan hệ nhiều nhiều với bảng sản phẩm thông qua bảng trung gian tag_san_phams
    public function sanPhams()  {
        return $this->belongsToMany(SanPham::class,'tag_san_phams','tag_id','san_pham_id');
    }
}

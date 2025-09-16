<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Tag extends Model
{
    use HasFactory, SoftDeletes; 

    protected $table = 'tags';

    protected $fillable = [
        'ten_tag',
        'trang_thai'
    ];
    protected $dates = ['deleted_at'];
    
    // Quan hệ 1-n với TagSanPham
    public function tagSanPhams()
    {
        return $this->hasMany(TagSanPham::class);
    }

    // Quan hệ nhiều-nhiều với SanPham
    public function sanPhams()
    {
        return $this->belongsToMany(SanPham::class, 'tag_san_phams', 'tag_id', 'san_pham_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banners";
    protected $fillable = [
        'ten_banner',
        'anh_banner',
        'trang_thai',
        'url_lien_ket'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Danhmuc extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_danh_muc',
        'anh_danh_muc',
    ];

    use SoftDeletes;

    protected $table = 'danh_mucs';
}

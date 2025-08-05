<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoiQua extends Model
{
    protected $fillable = ['user_id', 'khuyen_mai_id', 'diem_su_dung', 'ngay_doi', 'trang_thai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function khuyenMai()
    {
        return $this->belongsTo(KhuyenMai::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\KhuyenMai;

class LichSuDiem extends Model
{
    protected $table = 'lich_su_diems';

    protected $fillable = ['user_id', 'thay_doi', 'khuyen_mai_id' ,'loai', 'noi_dung'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function khuyenMai()
    {
        return $this->belongsTo(KhuyenMai::class, 'khuyen_mai_id');
    }
}

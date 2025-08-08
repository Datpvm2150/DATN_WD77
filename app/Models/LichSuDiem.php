<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichSuDiem extends Model
{
    protected $table = 'lich_su_diems';

    protected $fillable = ['user_id', 'thay_doi', 'loai', 'noi_dung'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

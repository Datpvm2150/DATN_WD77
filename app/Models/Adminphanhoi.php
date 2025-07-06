<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adminphanhoi extends Model
{
    use HasFactory;

    protected $table = 'admin_phan_hois';

    protected $fillable = [
        'lien_hes_id',
        'user_id',
        'reply',
    ];

    public function lienHe()
    {
        return $this->belongsTo(lien_hes::class, 'lien_hes_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lien_hes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'lien_hes';

    // Kiểm tra hoặc gán trạng thái phản hồi
    const STATUS_PENDING = 'pending'; // Trạng thái chờ xử lý
    const STATUS_RESOLVED = 'resolved'; // Trạng thái đã xử lý
    const STATUS_DELETED = 'deleted'; // Trạng thái đã xóa

    protected $fillable = [
        'ten_nguoi_gui',
        'tin_nhan',
        'trang_thai_phan_hoi',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function adminPhanHoi()
    {
        return $this->hasMany(Adminphanhoi::class, 'lien_hes_id');
    }
}
<?php

namespace App\Observers;

use App\Models\User;
use App\Models\DanhGiaSanPham;
use App\Models\HoaDon;
use App\Models\lien_hes;
use App\Models\Notification;

class NotificationObserver
{
    /**
     * Handle the "created" event for any model.
     *
     * @param  mixed  $model
     * @return void
     */
    public function created($model)
    {
        // Chỉ tạo thông báo cho User có vai_tro là 'user'
        if ($model instanceof User && $model->vai_tro !== 'user') {
            return;
        }

        $type = '';
        $dataId = $model->id;

        // Xác định loại thông báo dựa trên model
        if ($model instanceof User) {
            $type = 'user';
        } elseif ($model instanceof DanhGiaSanPham) {
            $type = 'danh_gia';
        } elseif ($model instanceof HoaDon) {
            $type = 'hoa_don';
        } elseif ($model instanceof lien_hes) {
            $type = 'lien_he';
        }

        // Tạo bản ghi thông báo mới
        if ($type) {
            Notification::create([
                'type' => $type,
                'data_id' => $dataId,
                'is_read' => false,
            ]);
        }
    }
}
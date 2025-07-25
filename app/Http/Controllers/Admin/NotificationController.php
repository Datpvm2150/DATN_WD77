<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Models\DanhGiaSanPham;
use App\Models\HoaDon;
use App\Models\lien_hes;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->paginate(10);
        $notificationData = [];

        foreach ($notifications as $notification) {
            $data = null;
            $route = '';
            $message = '';
            $avatar = asset('assets/admin/images/users/default.jpg');
            $name = '';

            if ($notification->type === 'user') {
                $data = User::find($notification->data_id);
                if ($data && $data->vai_tro === 'user') {
                    $route = route('admin.taikhoans.show', $data->id);
                    $message = 'Người dùng mới đăng ký';
                    $avatar = $data->anh_dai_dien ? asset('storage/' . $data->anh_dai_dien) : $avatar;
                    $name = $data->ten;
                }
            } elseif ($notification->type === 'danh_gia') {
                $data = DanhGiaSanPham::with(['user', 'sanPham'])->find($notification->data_id);
                if ($data) {
                    $route = route('admin.Danhgias.show', $data->id);
                    $message = 'Đánh giá mới cho sản phẩm <span class="text-reset">' . ($data->sanPham->ten_san_pham ?? 'Sản phẩm') . '</span>';
                    $avatar = $data->user->anh_dai_dien ? asset('storage/' . $data->user->anh_dai_dien) : $avatar;
                    $name = $data->user->ten;
                }
            } elseif ($notification->type === 'hoa_don') {
                $data = HoaDon::with('user')->find($notification->data_id);
                if ($data) {
                    $route = route('admin.hoadons.show', $data->id);
                    $message = 'Đơn hàng mới #' . $data->ma_hoa_don;
                    $avatar = $data->user->anh_dai_dien ? asset('storage/' . $data->user->anh_dai_dien) : $avatar;
                    $name = $data->user->ten;
                }
            } elseif ($notification->type === 'lien_he') {
                $data = lien_hes::with('user')->find($notification->data_id);
                if ($data) {
                    $route = route('admin.lienhes.form.reply', $data->id);
                    $message = 'Liên hệ mới từ ' . $data->ten_nguoi_gui;
                    $avatar = $data->user->anh_dai_dien ? asset('storage/' . $data->user->anh_dai_dien) : $avatar;
                    $name = $data->ten_nguoi_gui;
                }
            }

            if ($data) {
                $notificationData[] = [
                    'id' => $notification->id,
                    'type' => $notification->type,
                    'created_at' => $notification->created_at,
                    'route' => $route,
                    'message' => $message,
                    'avatar' => $avatar,
                    'name' => $name,
                    'is_read' => $notification->is_read,
                ];
            }
        }

        return view('admins.notifications.index', compact('notificationData', 'notifications'));
    }

    public function markAllAsRead()
    {
        Notification::where('is_read', false)->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Đã đánh dấu tất cả thông báo là đã đọc!');
    }
}
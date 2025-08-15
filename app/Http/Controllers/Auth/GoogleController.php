<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
     public function redirectToGoogle()
    {
        // Sử dụng stateless để tránh lỗi liên quan đến session khi triển khai qua proxy/CDN
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Throwable $e) {
            // Không lấy được thông tin từ Google
            return redirect()->route('customer.login')->with('error', 'Không thể xác thực Google. Vui lòng thử lại.');
        }

        if (!$googleUser || !$googleUser->getEmail()) {
            // Email là bắt buộc để ánh xạ tài khoản
            return redirect()->route('customer.login')->with('error', 'Google không cung cấp email hợp lệ.');
        }

        // Tìm theo email, bao gồm cả các tài khoản đã bị soft-delete
        $findUser = User::withTrashed()->where('email', $googleUser->getEmail())->first();

        if (!$findUser) {
            // Tạo tài khoản mới
            $findUser = User::create([
                'ten' => $googleUser->getName() ?: $googleUser->getNickname() ?: 'Người dùng',
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'anh_dai_dien' => $googleUser->getAvatar(),
                // Dùng hashed cast trong Model để mã hoá tự động
                'mat_khau' => Str::random(24),
                'vai_tro' => 'user',
            ]);

            // Xem như đã xác thực email qua Google
            $findUser->email_verified_at = now();
            $findUser->save();
        } else {
            // Khôi phục nếu bị soft-delete
            if ($findUser->trashed()) {
                $findUser->restore();
            }

            $update = [];

            if (empty($findUser->google_id)) {
                $update['google_id'] = $googleUser->getId();
            }
            if (!$findUser->ten && $googleUser->getName()) {
                $update['ten'] = $googleUser->getName();
            }
            if (!$findUser->anh_dai_dien && $googleUser->getAvatar()) {
                $update['anh_dai_dien'] = $googleUser->getAvatar();
            }
            if (is_null($findUser->email_verified_at)) {
                $findUser->email_verified_at = now();
            }

            if (!empty($update)) {
                $findUser->fill($update);
            }
            $findUser->save();
        }

        Auth::login($findUser);

        return redirect()->intended('/');
    }
}

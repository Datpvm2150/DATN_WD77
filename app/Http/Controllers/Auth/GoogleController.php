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

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'ten' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'anh_dai_dien' => $googleUser->getAvatar(),
                    'mat_khau' => bcrypt(Str::random(16)),                    
                ]
            );

            Auth::login($user);

            return redirect()->route('trangchu');
        } catch (\Exception $e) {
            return redirect()->route('customer.login')->with('error', 'Đăng nhập Google thất bại!');
        }
    }
}

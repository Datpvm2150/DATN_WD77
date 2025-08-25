<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Notifications\CustomerForgotPasswordNoti;

class CustomerForgotPasswordController extends Controller
{
    // Hiển thị form nhập email để quên mật khẩu
    public function ShowformForgotPasswword()
    {
        return view('auth.passwords.customer-email');
    }

    // Hiển thị form reset mật khẩu (nhập mật khẩu mới)
    public function formResetPassword(Request $request, $token = null)
    {
        return view('auth.passwords.customer-reset')->with([
            'token' => $token,
            'email' => $request->email
        ]);
    }

    // Gửi email reset mật khẩu
    public function SendEmailForgot(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            $request->only('email'),
            function ($user, $token) {

                // Tùy chỉnh URL
                $path = url(route('customer.password.reset', [
                    'token' => $token,
                    'email' => $user->getEmailForPasswordReset(),
                ], false));

                $user->notify(new CustomerForgotPasswordNoti($path));
            }
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);

                // // Kiểm tra các trạng thái cụ thể
                // if ($status === Password::RESET_LINK_SENT) {
                //     return back()->with(['status' => __($status)]);
                // } elseif ($status === Password::INVALID_USER) {
                //     return back()->withErrors(['email' => 'Chúng tôi không tìm thấy người dùng với địa chỉ email này.']);
                // } elseif ($status === Password::RESET_THROTTLED) {
                //     return back()->withErrors(['email' => 'Quá nhiều yêu cầu. Vui lòng thử lại sau.']);
                // } else {
                //     return back()->withErrors(['email' => __($status)]);
                // }
    }

    // Xử lý reset mật khẩu
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($customer, $password) {
                $customer->forceFill([
                    'mat_khau' => Hash::make($password), // Cột mật khẩu trong DB là 'mat_khau'
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('customer.login.post')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}

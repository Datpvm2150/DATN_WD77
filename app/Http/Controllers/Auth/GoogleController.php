<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
{
    // return Socialite::driver('google')->redirect();
    return Socialite::driver('google')->stateless()->redirect();

    
}

public function handleGoogleCallback()
{
    
    $user = Socialite::driver('google')->stateless()->user();


    
    // Xử lý đăng nhập hoặc tạo user
    // Ví dụ:
    $findUser = User::where('email', $user->getEmail())->first();
    if (!$findUser) {
        $findUser = User::create([
            'ten' => $user->getName(),
            'email' => $user->getEmail(),
            'google_id' => $user->getId(),
            'mat_khau' => bcrypt('default_password'),
           
        ]);

       
    }
    Auth::login($findUser);

    return redirect()->intended('/');
}

}

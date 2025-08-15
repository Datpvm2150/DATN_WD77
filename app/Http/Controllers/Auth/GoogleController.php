<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if a user with this email exists
            $user = User::where('email', $googleUser->email)->first();
            if (!$user) {
                // Create a new user if not found
                $user = User::create([
                    'ten' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'mat_khau' => bcrypt(uniqid()), // Random hashed password
                ]);
            }

            // Log in the user
            Auth::login($user);
            return redirect()->route('trangchu')->with('success', 'Login successful!');
        } catch (Exception $e) {
            return redirect()->route('customer.login')->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail(),
            ], [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(Str::random(16)),
                'avatar' => $googleUser->getAvatar(),
            ]);

            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Berhasil login dengan Google! Selamat datang ' . $user->name . '!');
        } catch (\Throwable $e) {
            return redirect()->route('login')->with('error', 'Gagal login dengan Google.');
        }
    }
}

<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
            $user = User::where('google_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user);
            } else {
                $newUser = User::updateOrCreate(['email' => $googleUser->email], [
                    'google_id' => $googleUser->id,
                    'username'  => $googleUser->name,
                    'password'  => bcrypt(Str::random(32)),
                ]);

                Auth::login($newUser);

                notyf()->success('Registered successfully');
            }
        } catch (\Throwable $e) {
            notyf()->error('Error occurred while registering, please try again');
        }

        return redirect()->route('main');
    }
}

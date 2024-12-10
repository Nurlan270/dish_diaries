<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\Auth\SendPassword;
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

                notyf()->success('Logged in successfully');
            } else {
                $password = Str::password(16, symbols: false);

                $newUser = User::updateOrCreate(['email' => $googleUser->email], [
                    'google_id' => $googleUser->id,
                    'username'  => $googleUser->name,
                    'password'  => bcrypt($password),
                ]);

                Auth::login($newUser);

                $newUser->notify(new SendPassword($password));

                notyf()->success('Registered successfully');
            }
        } catch (\Throwable $e) {
            notyf()->error('Error occurred while registering, please try again');
        }

        return redirect()->route('main');
    }
}

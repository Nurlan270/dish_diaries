<?php

namespace App\Http\Controllers\OAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $user = User::where('google_id', $googleUser->id)->firstOrCreate();

            if ($user) {
                Auth::login($user);
            } else {
                $newUser = User::updateOrCreate(['email' => $googleUser->email], [
                    'name'      => $googleUser->name,
                    'google_id' => $googleUser->id,
                    'password'  => encrypt('123456dummy'),
                ]);

                Auth::login($newUser);
            }

            return redirect()->route('main');

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}

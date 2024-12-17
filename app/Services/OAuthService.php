<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\Auth\SendPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

final class OAuthService
{
    public function auth(string $driver): void
    {
        try {
            $oauthUser = Socialite::driver($driver)->user();
            $user = User::where('email', $oauthUser->email)->first();

            if ($user) {
                $this->setAvatar($user, $oauthUser);

                Auth::login($user);

                notyf()->success('Logged in successfully');
            } else {
                $password = Str::password(16, symbols: false);

                $newUser = User::create([
                    'avatar'   => $oauthUser->avatar,
                    'username' => $oauthUser->name,
                    'email'    => $oauthUser->email,
                    'password' => bcrypt($password),
                ]);

                Auth::login($newUser);

                $newUser->notify(new SendPassword($password));

                notyf()->success('Registered successfully');
            }
        } catch (\Throwable $e) {
            notyf()->error('Error occurred while authenticating, please try again');
        }
    }

    protected function setAvatar(User $user, $oauthUser): void
    {
        if (Str::isUuid(
            preg_replace('/\..*$/', '', $user->avatar)
        )) {
            $user->update(['avatar' => $oauthUser->avatar]);
            Storage::disk('avatars')->delete($user->avatar);
        }
    }
}

<?php

namespace App\Http\Controllers\Auth\OAuth;

use App\Http\Controllers\Controller;
use App\Services\OAuthService;
use Laravel\Socialite\Facades\Socialite;

class GitHubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(OAuthService $authService)
    {
        $authService->auth('github');

        return redirect()->route('main');
    }
}

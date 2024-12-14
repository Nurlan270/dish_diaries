<?php

use App\Http\Controllers\OAuth\GitHubController;
use App\Http\Controllers\OAuth\GoogleController;
use App\Livewire\Auth\ResetPassword;

Route::middleware('guest')->group(function () {
    /*     OAuth2    */
    //  Google
    Route::controller(GoogleController::class)->group(function () {
        Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
    });

    //  GitHub
    Route::controller(GitHubController::class)->group(function () {
        Route::get('auth/github', 'redirectToGithub')->name('auth.github');
        Route::get('auth/github/callback', 'handleGithubCallback');
    });
});

Route::view('/reset-password/{token}', 'pages.main')
    ->middleware('guest')->name('password.reset');

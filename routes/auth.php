<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\OAuth\GitHubController;
use App\Http\Controllers\Auth\OAuth\GoogleController;

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

Route::post('logout', LogoutController::class)
    ->middleware('auth')->name('auth.logout');

Route::view('/reset-password/{token}', 'pages.main')
    ->middleware('guest')->name('password.reset');


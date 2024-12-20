<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\OAuth\GitHubController;
use App\Http\Controllers\Auth\OAuth\GoogleController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware('guest')->prefix(LaravelLocalization::setLocale())->group(function () {
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

Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Route::post('logout', LogoutController::class)
        ->middleware('auth')->name('auth.logout');

    Route::view('/password/reset/{token}', 'pages.main')
        ->middleware('guest')->name('password.reset');
});



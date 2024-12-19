<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

require 'auth.php';

Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Route::view('/', 'pages.main')->name('main');

    Route::view('/policy', 'pages.agreements.policy')->name('agreements.policy');
    Route::view('/terms', 'pages.agreements.terms')->name('agreements.terms');
});



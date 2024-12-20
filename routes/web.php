<?php

use App\Http\Controllers\SwitchLocaleController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

require 'auth.php';

Route::prefix(LaravelLocalization::setLocale())->group(function () {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/livewire/update', $handle);
    });

    Route::view('/', 'pages.main')->name('main');

    Route::view('/policy', 'pages.agreements.policy')->name('agreements.policy');
    Route::view('/terms', 'pages.agreements.terms')->name('agreements.terms');
});

Route::post('switch-locale/{locale}', SwitchLocaleController::class)->name('locale.switch');



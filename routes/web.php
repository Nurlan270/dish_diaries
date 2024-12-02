<?php

use Illuminate\Support\Facades\Route;

require 'auth.php';

Route::view('/', 'pages.main')->name('main');

Route::view('/policy', 'pages.agreements.policy')->name('agreements.policy');
Route::view('/terms', 'pages.agreements.terms')->name('agreements.terms');



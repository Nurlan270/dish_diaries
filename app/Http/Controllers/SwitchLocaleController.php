<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SwitchLocaleController extends Controller
{
    public function __invoke(string $locale)
    {
        Session::put('locale', $locale);
        return redirect()->intended();
    }
}

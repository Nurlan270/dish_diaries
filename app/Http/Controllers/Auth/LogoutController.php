<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        \Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        notyf()->success('Logged out');

        return redirect()->route('main');
    }
}

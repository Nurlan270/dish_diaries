<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginUserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public LoginUserForm $form;

    public function loginUser()
    {
        try {
            if (Auth::attempt($this->form->validate())) {
                notyf()->success('Logged in successfully');
            }
        } catch (\Throwable $e) {
            notyf()->error('Error occurred while logging, please try again');
        }
    }
}

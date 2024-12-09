<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterUserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterForm extends Component
{
    public RegisterUserForm $form;

    public function registerUser()
    {
        try {
            $user = User::create(
                $this->form->validate()
            );

            Auth::login($user);

            notyf()->success('Registered successfully');
        } catch (\Throwable $e) {
            notyf()->error('Error occurred while registering, please try again');
        }

        return redirect()->intended();
    }
}

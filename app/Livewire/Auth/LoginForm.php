<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginUserForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class LoginForm extends Component
{
    public LoginUserForm $form;

    public function loginUser()
    {
        try {
            if (Auth::attempt($this->form->validate(), (bool) $this->form->only('remember'))) {
                notyf()->success('Logged in successfully');

                return redirect()->intended();
            } else {
                notyf()->error('Login failed. Email or Password is incorrect');
            }
        } catch (ValidationException $e) {
            notyf()->error('Validation failed. Please check the information provided');
        } catch (\Throwable $e) {
            notyf()->error('Logging failed, please try again');
        }
    }
}

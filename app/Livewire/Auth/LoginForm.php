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
            if (Auth::attempt($this->form->validate(), $this->form->only('remember'))) {
                notyf()->success('Logged in successfully');
            }
        } catch (ValidationException $e) {
            notyf()->error('Login failed. Please check the information provided');
        } catch (\Throwable $e) {
            notyf()->error('Error occurred while logging, please try again');
        }
    }
}

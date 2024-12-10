<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterUserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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

            return redirect()->intended();
        } catch (ValidationException $e) {
            notyf()->error('Registration failed. Please check the information provided');
        } catch (\Throwable $e) {
            notyf()->error('An error occurred while registering, please try again');
        }
    }
}

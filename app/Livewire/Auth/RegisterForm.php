<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterUserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class RegisterForm extends Component
{
    public RegisterUserForm $form;

    public function registerUser()
    {
        try {
            $avatar = 'https://ui-avatars.com/api/?name='.urlencode($this->form->username).'&background=random';

            $user = User::create(array_merge(
                $this->form->validate(), ['avatar' => $avatar]
            ));

            Auth::login($user);

            notyf()->success('Registered successfully');

            return redirect()->intended();
        } catch (ValidationException $e) {
            notyf()->error('Validation failed. Please check the information provided');
        } catch (\Throwable $e) {
            notyf()->error('Registration failed, please try again');
            Log::error($e->getMessage());
        }
    }
}

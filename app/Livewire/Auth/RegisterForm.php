<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\RegisterUserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravolt\Avatar\Avatar;
use Livewire\Component;

class RegisterForm extends Component
{
    public RegisterUserForm $form;

    public function registerUser()
    {
        try {
            $avatarName = Str::uuid7().'.jpg';

            $user = User::create(array_merge(
                $this->form->validate(), ['avatar' => $avatarName]
            ));

            \Avatar::create($this->form->username)->save('storage/avatars/'.$avatarName);

            Auth::login($user);

            notyf()->success('Registered successfully');

            return redirect()->intended();
        } catch (ValidationException $e) {
            notyf()->error('Validation failed. Please check the information provided');
        } catch (\Throwable $e) {
            notyf()->error('Registration failed, please try again');
        }
    }
}

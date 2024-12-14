<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ResetPasswordForm extends Form
{
    #[Validate(as: 'Email')]
    public string $email;

    #[Validate(as: 'Password')]
    public string $password;

    #[Validate(as: 'Password confirmation')]
    public string $password_confirmation;

    public function rules(): array
    {
        return [
            'email'                 => [
                'required',
                'lowercase',
                'email',
            ],
            'password'              => [
                'required',
                'confirmed',
                Password::defaults(),
            ],
            'password_confirmation' => [
                'required',
                Password::defaults(),
            ],
        ];
    }
}

<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterUserForm extends Form
{
    #[Validate]
    public string $username;

    #[Validate]
    public string $email;

    #[Validate]
    public string $password;

    #[Validate]
    public string $password_confirmation;

    public function rules(): array
    {
        return [
            'username'              => [
                'required',
                'regex:/^.*\p{L}.*$/',
                'min:3',
                'max:25',
            ],
            'email'                 => [
                'required',
                'lowercase',
                'email',
                'unique:users',
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

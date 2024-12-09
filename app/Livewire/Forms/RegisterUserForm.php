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

    #[Validate(as: 'Password')]
    public string $password_confirmation;

    public function rules(): array
    {
        return [
            'username'              => [
                'required',
                'regex:/^(?=.*[a-zA-Z])[a-zA-Z0-9._-]*$/',
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
                'same:password',
                Password::defaults(),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'username.regex' => 'Username must contain at least 1 letter. Only ".", "_" and "-" symbols are allowed.',
        ];
    }
}

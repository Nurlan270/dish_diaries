<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginUserForm extends Form
{
    #[Validate(as: 'Email')]
    public string $email;

    #[Validate(as: 'Password')]
    public string $password;

    public bool $remember = true;

    public function rules()
    {
        return [
            'email'    => [
                'required',
                'email',
            ],
            'password' => [
                'required',
            ],
        ];
    }
}

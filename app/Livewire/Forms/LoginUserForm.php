<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginUserForm extends Form
{
    #[Validate]
    public string $email;

    #[Validate]
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

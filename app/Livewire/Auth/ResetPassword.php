<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\ResetPasswordForm;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use function Symfony\Component\String\s;

class ResetPassword extends Component
{
    public ResetPasswordForm $form;

    #[Validate('required')]
    public string $token;

    public function resetPassword()
    {
        $this->form->validate();

        $status = Password::reset(
            array_merge(
                ['token' => $this->token],
                $this->form->only('email', 'password', 'password_confirmation')
            ),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            notyf()->success(__('passwords.reset'));

            return redirect()->route('main');
        } else {
            notyf()->error(__($status));
        }
    }
}

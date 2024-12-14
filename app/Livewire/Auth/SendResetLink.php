<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SendResetLink extends Component
{
    #[Validate(['required', 'email'], as: 'Email')]
    public string $email;

    public function sendResetLink()
    {
        try {
            $this->validate();

            $status = Password::sendResetLink(['email' => $this->email]);

            if ($status === Password::RESET_LINK_SENT) {
                notyf()->success('Reset link sent to provided email, please check inbox or spam');

                return redirect()->route('main');
            } else {
                notyf()->error(__($status));
            }
        } catch (ValidationException $e) {
            notyf()->error('Validation failed. Please check the information provided');
        } catch (\Throwable $e) {
            notyf()->error('Error occurred, please try again');
        }
    }
}

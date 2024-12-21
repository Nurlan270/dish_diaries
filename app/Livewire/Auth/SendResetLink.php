<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SendResetLink extends Component
{
    #[Validate(['required', 'email'])]
    public string $email;

    public function sendResetLink()
    {
        try {
            $this->validate();

            $status = Password::sendResetLink(['email' => $this->email]);

            if ($status === Password::RESET_LINK_SENT) {
                notyf()->success(__('notification.reset_link_sent'));

                return redirect()->route('main');
            } else {
                notyf()->error(__($status));
            }
        } catch (ValidationException $e) {
            notyf()->error(__('notification.errors.validation'));
        } catch (\Throwable $e) {
            notyf()->error(__('notification.errors.unknown'));
        }
    }
}

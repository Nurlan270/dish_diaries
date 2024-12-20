<form wire:submit="registerUser" method="POST" class="flex flex-col justify-center">
    <x-form.input-field type="text" name="form.username" label="{{ __('auth.form.username') }}" required
                        wire:model.live.debounce="form.username"/>

    <x-form.input-field type="email" name="form.email" label="{{ __('auth.form.email') }}" required
                        wire:model.live.debounce="form.email"/>

    <x-form.input-field type="password" name="form.password" label="{{ __('auth.form.password') }}" required
                        wire:model.live.debounce="form.password"/>

    <x-form.input-field type="password" name="form.password_confirmation" label="{{ __('auth.form.password-confirmation') }}" required
                        wire:model.live.debounce="form.password_confirmation"/>

    <x-form.button text="{{ __('auth.sign-up') }}" targets="form,registerUser"
                   loading-add-classes="dark:opacity-70 opacity-80"
                   loading-remove-classes="hover:bg-blue-800 dark:hover:bg-blue-700"/>
</form>

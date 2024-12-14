<form wire:submit="resetPassword" method="POST" class="flex flex-col justify-center">
    <input type="hidden" name="token" value="{{ $token }}">

    <x-form.input-field type="email" name="form.email" label="Email" required
                        wire:model.live.debounce="form.email"/>

    <x-form.input-field type="password" name="form.password" label="Password" required
                        wire:model.live.debounce="form.password"/>

    <x-form.input-field type="password" name="form.password_confirmation" label="Password confirmation" required
                        wire:model.live.debounce="form.password_confirmation"/>

    <x-form.button text="Update password" targets="form,resetPassword"
                   loading-add-classes="dark:opacity-70 opacity-80"
                   loading-remove-classes="hover:bg-blue-800 dark:hover:bg-blue-700"/>
</form>

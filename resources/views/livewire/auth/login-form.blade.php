<form wire:submit="loginUser" method="POST">
    <x-form.input-field type="email" name="form.email" label="{{ __('auth.form.email') }}" wire:model.live.debounce="form.email" required/>

    <x-form.input-field type="password" name="form.password" label="{{ __('auth.form.password') }}" wire:model="form.password" required/>

    <x-form.checkbox text="{{ __('auth.form.remember') }}" wire:model="form.remember" wire:click="$toggle('form.remember')"/>

    <div class="flex items-center justify-between flex-wrap mt-5">
        <button
            type="button"
            data-modal-hide="login-form-modal"
            data-modal-target="send-reset-link-modal"
            data-modal-toggle="send-reset-link-modal"
            class="dark:text-white text-blue-600 text-sm underline">
            {{ __('auth.password.forgot') }}
        </button>

        <x-form.button text="{{ __('auth.sign-in') }}" targets="form,loginUser"
                       loading-add-classes="dark:opacity-70 opacity-80"
                       loading-remove-classes="hover:bg-blue-800 dark:hover:bg-blue-700"/>
    </div>
</form>

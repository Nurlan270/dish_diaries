<form wire:submit="loginUser" method="POST">
    <x-form.input-field type="email" name="form.email" label="Email" wire:model.live.debounce="form.email" required/>

    <x-form.input-field type="password" name="form.password" label="Password" wire:model="form.password" required/>

    <x-form.checkbox text="Remember me" wire:model="form.remember" wire:click="$toggle('form.remember')"/>

    <div class="flex items-center justify-between flex-wrap">
        <button
            data-modal-hide="login-form-modal"
            data-modal-target="send-reset-link-modal"
            data-modal-toggle="send-reset-link-modal"
            class="dark:text-white text-blue-600 text-sm underline">
            Forgot password?
        </button>

        <x-form.button text="Sign in" targets="form,loginUser"
                       loading-add-classes="dark:opacity-70 opacity-80"
                       loading-remove-classes="hover:bg-blue-800 dark:hover:bg-blue-700"/>
    </div>
</form>

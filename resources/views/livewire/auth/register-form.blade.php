<form wire:submit="registerUser" method="POST" class="flex flex-col justify-center">
    <x-form.input-field type="text" name="username" label="Username" required
                   wire:model.live.debounce="form.username"/>

    <x-form.input-field type="email" name="email" label="Email" required
                   wire:model.live.debounce="form.email"/>

    <x-form.input-field type="password" name="password" label="Password" required
                   wire:model.live.debounce="form.password"/>

    <x-form.input-field type="password" name="password_confirmation" label="Password confirmation" required
                   wire:model.live.debounce="form.password_confirmation"/>

    <button
        wire:target="form,registerUser"
        wire:loading.attr="disabled"
        wire:loading.class="dark:opacity-70 opacity-80"
        wire:loading.class.remove="hover:bg-blue-800 dark:hover:bg-blue-700"
        type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 transition-colors font-medium flex items-center justify-center gap-x-3 rounded-lg text-sm py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700">
        <x-loader wire:target="form,registerUser" />
        <p wire:loading.remove>Sign up</p>
    </button>
</form>

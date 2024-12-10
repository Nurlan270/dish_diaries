<form wire:submit="loginUser" method="POST">
    <x-form.input-field type="email" name="email" label="Email" wire:model.live.debounce="form.email"/>

    <x-form.input-field type="password" name="password" label="Password" wire:model="form.password"/>

    <x-form.checkbox text="Remember me" wire:model="form.remember" wire:click="$toggle('form.remember')" checked/>

    <div class="flex items-center justify-between flex-wrap">
        <button class="dark:text-white text-blue-600 text-sm underline">
            Forgot password?
        </button>

        <button
            type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 transition-colors font-medium rounded-lg text-sm px-6 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700">
            Sign in
        </button>
    </div>
</form>

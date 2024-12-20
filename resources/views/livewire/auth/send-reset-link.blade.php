<form wire:submit="sendResetLink" method="POST" class="flex flex-col justify-center">
    <x-form.input-field name="email" label="{{ __('auth.form.email') }}" type="email" wire:model.live.debounce="email" required/>

    <button
        wire:loading.class="dark:opacity-70 opacity-80"
        wire:loading.class.remove="hover:bg-blue-800 dark:hover:bg-blue-700"
        type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition-colors font-medium rounded-lg text-sm px-6 py-2 text-center flex items-center justify-center">
        <x-loader />
        <p wire:loading.remove>{{ __('auth.send-reset-link') }}</p>
    </button>
</form>

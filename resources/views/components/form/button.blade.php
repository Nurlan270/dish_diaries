<button
    wire:target="{{ $targets }}"
    wire:loading.class="{{ $loadingAddClasses }}"
    wire:loading.class.remove="{{ $loadingRemoveClasses }}"
    type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 transition-colors font-medium rounded-lg text-sm px-6 py-2 text-center flex items-center justify-center">
    <x-loader wire:loading wire:target="{{ $targets }}"/>
    <p wire:loading.remove>{{ $text }}</p>
</button>

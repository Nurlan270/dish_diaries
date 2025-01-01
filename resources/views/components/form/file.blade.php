<div class="mb-5">
    <div class="flex items-center justify-between mb-2">
        <label class="text-sm font-medium text-gray-900 dark:text-white" for="{{ $name }}">{{ $label }}</label>
        <div wire:loading
             wire:target="{{ $name }}"
             class="flex items-center justify-center gap-x-4 text-gray-500 dark:text-white"
        >
            <x-loader class="inline-block align-middle"/>
            <span class="text-sm align-middle">Uploading</span>
        </div>
    </div>
    <input
        type="file"
        id="{{ $name }}"
        name="{{ $name }}"
        aria-describedby="file_input_help"
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        {{ $attributes }}
        {{ $attributes->has('multiple') ? 'multiple' : '' }}
        {{ $attributes->has('accept') ? $accept : '' }}>
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">{{ $tips ?? '' }}</p>
    @error($name.'.*') <span class="text-red-500 text-xs mt-2 ms-1">{{ $message }}</span> @enderror
</div>

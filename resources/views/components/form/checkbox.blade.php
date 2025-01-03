@props(['name' => 'checkbox-'.Str::uuid(), 'text' => ''])

<div class="flex items-center">
    <input id="{{ $name }}" type="checkbox" {{ $attributes }}
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="{{ $name }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
        {{ $text }}
    </label>
</div>

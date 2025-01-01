<form wire:submit="createRecipe" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
    <x-form.file
        required
        multiple
        name="form.recipeImages"
        wire:model.live="form.recipeImages"
        label="{{ __('recipe-modal.field-titles.images.title') }}"
        tips="{{ __('recipe-modal.field-titles.images.tips') }}"
        accept="image/png, image/jpg, image/jpeg"/>

    <div class="mb-5">
        <label for="title"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('recipe-modal.field-titles.title') }}</label>
        <input type="text" id="title" placeholder="{{ __('recipe-modal.placeholder.title') }}"
               wire:model="form.title"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-5" wire:ignore>
        <label for="ingredients"
               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('recipe-modal.field-titles.ingredients') }}</label>
        <select id="ingredients" name="form.ingredients" wire:model="form.ingredients" multiple></select>
    </div>

    <div class="mb-5">
        <label
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('recipe-modal.field-titles.description') }}</label>
        <livewire:partials.quill/>
    </div>

    <div class="flex justify-between items-center">
        <x-form.checkbox text="{{ __('recipe-modal.draft') }}" wire:model="form.saveToDrafts"
                         wire:click="$toggle('form.saveToDrafts')"/>

        <button type="submit"
                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                      clip-rule="evenodd"></path>
            </svg>
            {{ __('recipe-modal.create') }}
        </button>
    </div>
</form>

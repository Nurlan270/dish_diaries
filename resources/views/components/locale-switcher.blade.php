<div class="flex ms-2">
    <button id="states-button" data-dropdown-toggle="locale-dropdown"
            class="flex-shrink-0 z-10 inline-flex items-center gap-x-1 py-2 px-2 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
            type="button">
        <img class="size-5" src="{{ asset('media/svg/'. App::getLocale() .'_flag.svg') }}" alt="Flag">
        <p class="hidden sm:block">{{ Str::upper(App::getLocale()) }}</p>
    </button>
    <div id="locale-dropdown"
         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
        <form id="switch-locale" action="{{ route('locale.switch', ['locale' => getOppositeLocale()]) }}" method="POST">@csrf</form>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="states-button">
            <li>
                <button type="submit" form="switch-locale"
                        class="inline-flex w-full px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <div class="inline-flex items-center gap-x-1">
                        <img class="size-5" src="{{ asset('media/svg/'. getOppositeLocale() .'_flag.svg') }}" alt="Flag">
                        <p>{{ Str::upper(getOppositeLocale()) }}</p>
                    </div>
                </button>
            </li>
        </ul>
    </div>
</div>

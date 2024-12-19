<header>

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ config('app.url') }}" class="flex items-center rtl:space-x-reverse">
                <img src="{{ asset('media/logos/logo-white.svg') }}" class="h-10 hidden dark:block"
                     alt="{{ config('app.name') }} Logo"/>
                <img src="{{ asset('media/logos/logo-black.svg') }}" class="h-10 block dark:hidden"
                     alt="{{ config('app.name') }} Logo"/>
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white hidden xs:block">{{ config('app.name') }}</span>
            </a>
            <div class="flex md:order-2">
                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                        aria-expanded="false"
                        class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5 me-1">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar"
                           class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                           placeholder="Search...">
                </div>

                <livewire:theme-toggler/>

                @auth
                    {{--        Profile        --}}
                    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                            class="flex items-center justify-center text-sm md:me-0"
                            type="button">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-9 h-9 rounded-full" src="{{ getAvatarURI(Auth::user()) }}"
                             alt="User avatar">
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownAvatar"
                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div class="font-bold">{{ Auth::user()->username }}</div>
                            <div class="font-medium text-xs truncate">{{ Auth::user()->email }}</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownUserAvatarButton">
                            <li>
                                <a href="#"
                                   class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white font-medium flex items-center gap-x-3">
                                    <x-fas-user class="size-4"/>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white font-medium flex items-center gap-x-3">
                                    <x-akar-reciept class="size-4"/>
                                    My recipes
                                </a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <form id="logout" action="{{ LaravelLocalization::localizeURL('/logout') }}" method="POST">@csrf</form>
                            <button type="submit" form="logout"
                               class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white font-medium w-full flex items-center gap-x-3">
                                <x-solar-logout-2-outline class="size-4"/>
                                Log out
                            </button>
                        </div>
                    </div>
                @endauth

                @guest
                    <x-auth-modal/>
                @endguest

                <button data-collapse-toggle="navbar-search" type="button"
                        class="inline-flex items-center ms-2 p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700"
                        aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="search-navbar"
                           class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Search...">
                </div>
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                           aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#"
                           class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>

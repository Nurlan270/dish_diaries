@guest
    <div>
        <button
            data-modal-target="authentication-modal"
            data-modal-toggle="authentication-modal"
            class="text-white bg-blue-700 hover:bg-blue-800 transition-colors font-medium rounded-lg text-sm ms-2 px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700"
            type="button">
            Get started
        </button>

        {{-- Auth modal --}}
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    {{-- Modal header --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex space-x-2 items-center">
                            <x-phosphor-keyhole-duotone class="w-7 h-auto"/>
                            <span>Sign in to our platform</span>
                        </h3>
                        <button type="button"
                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    {{-- Modal body --}}
                    <div class="p-4 md:p-5 flex flex-wrap justify-center gap-5">
                        <button onclick="window.location.href='{{ route('auth.google') }}'"
                                class="dark:bg-black dark:text-white dark:border-none bg-white hover:bg-gray-100 transition-colors text-gray-600 text-sm border-2 px-5 py-3 w-full sm:w-fit rounded-2xl font-bold cursor-pointer flex items-center justify-center gap-x-3">
                            <x-icons.google/>
                            Sign in with Google
                        </button>

                        <button onclick="window.location.href='{{ route('auth.github') }}'"
                                class="dark:bg-gray-500 dark:text-black dark:border-none bg-white hover:bg-gray-100 transition-colors text-black text-sm border-2 px-5 py-3 w-full sm:w-fit rounded-2xl font-bold cursor-pointer flex items-center justify-center gap-x-3">
                            <x-icons.github/>
                            Sign in with GitHub
                        </button>

                        <div class="inline-flex items-center justify-center w-full">
                            <hr class="w-64 h-px my-4 bg-gray-400 border-0 dark:bg-gray-400">
                            <span
                                class="absolute px-3 font-medium text-sm text-gray-900 -translate-x-1/2 bg-white dark:bg-gray-700 left-1/2 dark:text-white">OR</span>
                        </div>

                        <button
                            data-modal-hide="authentication-modal"
                            data-modal-target="login-form-modal"
                            data-modal-toggle="login-form-modal"
                            class="dark:bg-blue-600 dark:text-white dark:border-none hover:bg-gray-100 transition-colors text-blue-600 text-sm border-2 px-5 py-3 w-full sm:w-fit rounded-2xl font-bold cursor-pointer flex items-center justify-center gap-x-3">
                            <x-ionicon-mail class="w-6 h-auto"/>
                            Sign in with Email
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{--    Login Modal    --}}
        <div id="login-form-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    {{-- Modal header --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex space-x-2 items-center">
                            <x-phosphor-keyhole-duotone class="w-7 h-auto"/>
                            <span>Sign in</span>
                        </h3>
                        <div>
                            <button
                                data-modal-hide="login-form-modal"
                                data-modal-target="register-form-modal"
                                data-modal-toggle="register-form-modal"
                                class="me-3 underline inline-flex text-sm font-semibold gap-x-1 dark:text-white text-black">
                                SIGN UP
                                <x-untitledui-link-external-01 class="w-3.5 h-auto"/>
                            </button>
                            <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="login-form-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                    </div>

                    {{-- Modal body --}}
                    <div class="p-4 md:p-5">
                        <livewire:auth.login-form/>
                    </div>
                </div>
            </div>
        </div>

        {{--    Register Modal    --}}
        <div id="register-form-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    {{-- Modal header --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex space-x-2 items-center">
                            <x-phosphor-keyhole-duotone class="w-7 h-auto"/>
                            <span>Sign up</span>
                        </h3>
                        <div>
                            <button
                                data-modal-hide="register-form-modal"
                                data-modal-target="login-form-modal"
                                data-modal-toggle="login-form-modal"
                                class="me-3 underline inline-flex text-sm font-semibold gap-x-1 dark:text-white text-black">
                                SIGN IN
                                <x-untitledui-link-external-01 class="w-3.5 h-auto"/>
                            </button>
                            <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="register-form-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                    </div>

                    {{-- Modal body --}}
                    <div class="p-4 md:p-5">
                        <livewire:auth.register-form/>
                    </div>
                </div>
            </div>
        </div>

        {{--    Send reset link Modal    --}}
        <div id="send-reset-link-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-lg max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    {{-- Modal header --}}
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex space-x-2 items-center">
                            <x-phosphor-keyhole-duotone class="w-7 h-auto"/>
                            <span>Reset password</span>
                        </h3>
                        <div>
                            <button
                                data-modal-hide="send-reset-link-modal"
                                data-modal-target="login-form-modal"
                                data-modal-toggle="login-form-modal"
                                class="me-3 underline inline-flex text-sm font-semibold gap-x-1 dark:text-white text-black">
                                SIGN IN
                                <x-untitledui-link-external-01 class="w-3.5 h-auto"/>
                            </button>
                            <button type="button"
                                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="send-reset-link-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                    </div>

                    {{-- Modal body --}}
                    <div class="p-4 md:p-5">
                        <livewire:auth.send-reset-link/>
                    </div>
                </div>
            </div>
        </div>

        {{--    Password reset Modal    --}}
        @if(Route::is('password.reset'))
            <div id="password-reset-modal" tabindex="-1" aria-hidden="true"
                 class="overflow-y-auto overflow-x-hidden fixed top-0 left-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-lg max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        {{-- Modal header --}}
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white flex space-x-2 items-center">
                                <x-phosphor-keyhole-duotone class="w-7 h-auto"/>
                                <span>Reset password</span>
                            </h3>
                            <div>
                                <button type="button"
                                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="password-reset-modal"
                                        data-modal-target="password-reset-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none"
                                         viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                        </div>

                        {{-- Modal body --}}
                        <div class="p-4 md:p-5">
                            <livewire:auth.reset-password :token="request()->token"/>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endguest

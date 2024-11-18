<div>


    <div class="h-full">
        <x-primary-button data-modal-target="default-modal" data-modal-toggle="default-modal" class="h-full">
            {{ __('Crear usuario') }}
        </x-primary-button>
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Crear usuario
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form method="POST" action="" wire:submit.prevent='createUser'>
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name"
                                :value="old('name')" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="surname" :value="__('Apellidos')" />
                            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname"
                                :value="old('surname')" autofocus autocomplete="surname" />
                            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="department" :value="__('Departamento')" />
                            <select id="department" name="department"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="" disabled selected>{{ __('Seleccionar departamento') }}</option>
                                @foreach ($userDepartments as $department)
                                    <option value="{{ $department->value }}"
                                        {{ old('department') == $department->value ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('department')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="privileges" :value="__('Permisos')" />
                            <select name="privileges" id="privileges"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="" disabled selected>{{ __('Seleccionar permisos') }}</option>
                                @foreach ($userPrivileges as $privilege)
                                    <option value="{{ $privilege->value }}"
                                        {{ old('privileges') == $privilege->value ? 'selected' : '' }}>
                                        {{ $privilege->label() }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('privileges')" class="mt-2" />
                        </div>




                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Contraseña')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div
                            class="flex w-full justify-between py-4 md:py-5 border-t border-gray-200 rounded-b dark:border-gray-600 ">
                            <x-primary-button>CREAR usuario</x-primary-button>
                            <x-secondary-button type="button">cancelar</x-primary-button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

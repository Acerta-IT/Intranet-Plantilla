<x-app-layout>
    <x-slot name="header">
        Crear usuario
    </x-slot>
    <div class="px-10 max-w-md">
        <form method="POST" action="{{ route('user.create') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="surname" :value="__('Apellidos')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')"
                    autofocus autocomplete="surname" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="department" :value="__('Departamento')" />
                <select id="department" name="department"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="" disabled selected>{{ __('Seleccionar departamento') }}</option>
                    @foreach (\App\Enums\Departments::cases() as $department)
                        <option value="{{ $department->value }}"
                            {{ old('department') == $department->value ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('department')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="privileges" :value="__('Perfil')" />
                <select name="privileges" id="privileges"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="" disabled selected>{{ __('Seleccionar permisos') }}</option>
                    @foreach (\App\Enums\Privileges::cases() as $privilege)
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
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autocomplete="username" />
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

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="w-full">
                    {{ __('Crear usuario') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

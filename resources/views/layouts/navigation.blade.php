<aside
    class="fixed top-0 left-0 z-40 w-80 h-dvh transition-transform -translate-x-full sm:translate-x-0 bg-secondary flex flex-col justify-between text-neutral2">

    <!-- Contenido superior -->
    <div>
        <div class="flex justify-center mt-8">
            <x-application-logo class="block h-24 fill-current text-gray-800 justify-center" />
        </div>

        <hr class="mx-4 border-neutral1 mt-8">
        <div class="flex gap-4 ml-4 my-4 items-center">
            <div>
                <img src="{{ asset('user placeholder.png') }}" alt="Logo"
                    class="w-12 h-12 rounded-full border-2 border-neutral1">
            </div>
            <div>
                <p><span class="text-neutral">{{ auth()->user()->name . ' ' . auth()->user()->surname }}</span></p>
                <p><span class="text-neutral2 text-sm">{{ auth()->user()->email }}</span></p>
            </div>
        </div>
        <hr class="mx-4 border-neutral1 mb-5">

        <!-- Contenedor con scroll solo para los x-nav-link -->
        <div x-data="{ activeIndex: null }" class="flex flex-col mt-8 overflow-y-auto max-h-[60vh] select-none">
            <!-- Opción 1 -->
            <div class="p-4">
                <!-- Encabezado colapsable -->
                <div @click="activeIndex = activeIndex === 0 ? null : 0"
                    class="flex justify-between items-center cursor-pointer text-neutral2 px-4 py-3 rounded-md hover:bg-acertaLightGray">
                    <span class="flex gap-2 items-center">
                        <span class="material-symbols-outlined">settings</span>
                        {{ __('Gestión de usuarios 1') }}
                    </span>
                    <span class="material-symbols-outlined"
                        x-text="activeIndex === 0 ? 'expand_more' : 'chevron_right'"></span>
                </div>

                <!-- Subopciones con animación -->
                <div x-show="activeIndex === 0" x-transition:enter="transition-all linear duration-75"
                    x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
                    x-transition:leave="transition-all linear duration-75"
                    x-transition:leave-start="opacity-100 max-h-screen" x-transition:leave-end="opacity-0 max-h-0"
                    class="mt-2 space-y-2 overflow-hidden">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <x-slot name="icon">timer</x-slot>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        <x-slot name="icon">group</x-slot>
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Opción 2 -->
            <div class="p-4">
                <!-- Encabezado colapsable -->
                <div @click="activeIndex = activeIndex === 1 ? null : 1"
                    class="flex justify-between items-center cursor-pointer text-neutral2 px-4 py-3 rounded-md hover:bg-acertaLightGray">
                    <span class="flex gap-2 items-center">
                        <span class="material-symbols-outlined">settings</span>
                        {{ __('Gestión de usuarios 2') }}
                    </span>
                    <span class="material-symbols-outlined"
                        x-text="activeIndex === 1 ? 'expand_more' : 'chevron_right'"></span>
                </div>

                <!-- Subopciones con animación -->
                <div x-show="activeIndex === 1" x-transition:enter="transition-all linear duration-75"
                    x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
                    x-transition:leave="transition-all linear duration-75"
                    x-transition:leave-start="opacity-100 max-h-screen" x-transition:leave-end="opacity-0 max-h-0"
                    class="mt-2 space-y-2 overflow-hidden">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <x-slot name="icon">timer</x-slot>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        <x-slot name="icon">group</x-slot>
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Opción 3 -->
            <div class="p-4">
                <!-- Encabezado colapsable -->
                <div @click="activeIndex = activeIndex === 2 ? null : 2"
                    class="flex justify-between items-center cursor-pointer text-neutral2 px-4 py-3 rounded-md hover:bg-acertaLightGray">
                    <span class="flex gap-2 items-center">
                        <span class="material-symbols-outlined">settings</span>
                        {{ __('Gestión de usuarios 3') }}
                    </span>
                    <span class="material-symbols-outlined"
                        x-text="activeIndex === 2 ? 'expand_more' : 'chevron_right'"></span>
                </div>

                <!-- Subopciones con animación -->
                <div x-show="activeIndex === 2" x-transition:enter="transition-all linear duration-75"
                    x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
                    x-transition:leave="transition-all linear duration-75"
                    x-transition:leave-start="opacity-100 max-h-screen" x-transition:leave-end="opacity-0 max-h-0"
                    class="mt-2 space-y-2 overflow-hidden">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <x-slot name="icon">timer</x-slot>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        <x-slot name="icon">group</x-slot>
                        {{ __('Usuarios') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Agrega más opciones aquí -->
        </div>
    </div>

    <!-- Sección inferior (logout) que no se desplaza -->
    <div class="mb-5 flex flex-col mt-10 gap-4">
        <form method="POST" action="{{ route('logout') }}"
            class="flex items-center px-4 py-3 w-full hover:bg-acertaLightGray text-left gap-2">
            @csrf
            <span class="material-symbols-outlined">
                logout
            </span>
            <button type="submit">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</aside>

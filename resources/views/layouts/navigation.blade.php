<aside x-data="{
    activeIndex: null,
    init() {
        // Configura el índice inicial basado en la ruta activa
        if ('{{ request()->routeIs('dashboard') }}') {
            this.activeIndex = 0;
        } else if ('{{ request()->routeIs('user.index') }}') {
            this.activeIndex = 0; // Mantén Gestión de Usuarios desplegado
        } else if ('{{ request()->routeIs('other.route') }}') {
            this.activeIndex = 2;
        } else {
            this.activeIndex = null; // Ninguna opción desplegada por defecto
        }
    }
}"
    class="fixed top-0 left-0 z-40 w-80 h-dvh transition-transform -translate-x-full sm:translate-x-0 bg-secondary flex flex-col justify-between text-neutral2 shadow-md">

    <!-- Contenido superior -->
    <div>
        <div class="flex justify-center mt-8">
            <x-application-logo class="block h-20 fill-current text-gray-800 justify-center" />
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
        <hr class="mx-4 border-neutral1 mb-10">

        <!-- Contenedor con scroll solo para los x-nav-link -->
        <div class="flex flex-col overflow-y-auto max-h-[60vh] select-none">
            <!-- Opción 1 -->
            <div class="px-4 pb-2">
                <!-- Encabezado colapsable -->
                <div @click="activeIndex = activeIndex === 0 ? null : 0"
                    class="flex justify-between items-center cursor-pointer text-neutral2 px-4 py-2 rounded-md hover:text-neutral4">
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
                    class="overflow-hidden">
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

    <!-- Sección inferior (logout) -->
    <div class="mb-5 flex flex-col mt-10 gap-4">
        <form method="POST" action="{{ route('logout') }}" class="flex items-center px-4 py-3 w-full text-left gap-2">
            @csrf

            <button type="submit" class="flex hover:text-neutral4">

                <span class="material-symbols-outlined">
                    logout
                </span>
                {{ __('Logout') }}
            </button>

        </form>
    </div>
</aside>

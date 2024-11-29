<aside x-data="{
    activeIndexes: [], // Cambiar de un solo índice a un array
    init() {
        // Recuperar el estado guardado desde localStorage
        const savedIndexes = JSON.parse(localStorage.getItem('activeIndexes'));
        this.activeIndexes = Array.isArray(savedIndexes) ? savedIndexes : [];
    },
    toggle(index) {
        // Si el índice ya está activo, quítalo; de lo contrario, agrégalo
        if (this.activeIndexes.includes(index)) {
            this.activeIndexes = this.activeIndexes.filter(i => i !== index);
        } else {
            this.activeIndexes.push(index);
        }

        // Guardar el estado en localStorage
        localStorage.setItem('activeIndexes', JSON.stringify(this.activeIndexes));
    },
    isActive(index) {
        // Verifica si el índice está en el array de activos
        return this.activeIndexes.includes(index);
    }
}"
       class="top-0 left-0 z-40 w-80 h-dvh transition-transform -translate-x-full sm:translate-x-0 bg-secondary flex flex-col justify-between text-neutral2 shadow-md">

    <!-- Contenido superior -->
    <div>
        <div class="flex justify-center mt-8">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-20 fill-current text-gray-800 justify-center"/>
            </a>
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
            <div class="px-2 pb-2">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <x-slot name="icon">dashboard</x-slot>
                    Dashboard
                </x-nav-link>
            </div>

            <!-- Dropdown 1 -->
            @if(auth()->user()->privileges === 1)
                <div class="px-4 pb-2">
                    <!-- Encabezado colapsable -->
                    <div @click="toggle(0)"
                         class="flex justify-between items-center cursor-pointer text-neutral2 px-4 py-2 rounded-md hover:text-neutral4">
                    <span class="flex gap-2 items-center">
                        <span class="material-symbols-outlined">settings</span>
                        Gestión de usuarios
                    </span>
                        <span class="material-symbols-outlined"
                              x-text="isActive(0) ? 'expand_more' : 'chevron_right'"></span>
                    </div>


                    <div x-show="isActive(0)" x-transition:enter="transition-all linear duration-75"
                         x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
                         x-transition:leave="transition-all linear duration-75"
                         x-transition:leave-start="opacity-100 max-h-screen" x-transition:leave-end="opacity-0 max-h-0"
                         class="overflow-hidden">


                        <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')" level="2">
                            <x-slot name="icon">group</x-slot>
                            Usuarios
                        </x-nav-link>
                    </div>
                </div>
            @endif

            <!-- Dropdown 2 -->
            <div class="px-4 pb-2">
                <!-- Encabezado colapsable -->
                <div @click="toggle(1)"
                     class="flex justify-between items-center cursor-pointer text-neutral2 px-4 py-2 rounded-md hover:text-neutral4">
                    <span class="flex gap-2 items-center">
                        <span class="material-symbols-outlined">work</span>
                       Laboral
                    </span>
                    <span class="material-symbols-outlined"
                          x-text="isActive(1) ? 'expand_more' : 'chevron_right'"></span>
                </div>

                <!-- Subopciones con animación -->
                <div x-show="isActive(1)" x-transition:enter="transition-all linear duration-75"
                     x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen"
                     x-transition:leave="transition-all linear duration-75"
                     x-transition:leave-start="opacity-100 max-h-screen" x-transition:leave-end="opacity-0 max-h-0"
                     class="overflow-hidden">
                    <x-nav-link :href="route('clocking.index')" :active="request()->routeIs('clocking.index')"
                                level="2">
                        <x-slot name="icon">timer</x-slot>
                        Fichaje
                    </x-nav-link>
                </div>
            </div>
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

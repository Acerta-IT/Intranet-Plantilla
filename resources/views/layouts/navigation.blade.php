<aside
    class="fixed top-0 left-0 z-40 w-80 h-dvh transition-transform -translate-x-full sm:translate-x-0 bg-acertaGray flex flex-col justify-between text-white">

    <!-- Contenido superior -->
    <div>
        <div class="flex justify-center mt-10">
            <x-application-logo class="block h-24 fill-current text-gray-800 justify-center" />
        </div>

        <hr class="mx-4 border-gray-600 mt-5">
        <div class="flex flex-col ml-4 my-4">
            <p>{{ auth()->user()->name . ' ' . auth()->user()->surname }}</p>
            <p>{{ auth()->user()->email }}</p>
        </div>
        <hr class="mx-4 border-gray-600 mb-5">

        <!-- Contenedor con scroll solo para los x-nav-link -->
        <div class="flex flex-col mt-10 overflow-y-auto max-h-[60vh]">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <x-slot name="icon">timer</x-slot>
                {{ __('Dashboard') }}
            </x-nav-link>

            <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                <x-slot name="icon">group</x-slot>
                {{ __('Usuarios') }}
            </x-nav-link>

            <!-- Agrega más x-nav-link aquí -->
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

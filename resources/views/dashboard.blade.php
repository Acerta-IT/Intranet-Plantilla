<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <x-nav-dropdown dropDownId=0>
                        <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')" level="2">
                            <x-slot name="icon">group</x-slot>
                            Usuarios
                        </x-nav-link>
                        <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')" level="2">
                            <x-slot name="icon">group</x-slot>
                            Usuarios
                        </x-nav-link>
                    </x-nav-dropdown>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

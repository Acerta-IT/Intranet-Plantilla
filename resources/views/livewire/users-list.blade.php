<div>
    {{-- @endif --}}

    <div class="flex justify-between mb-10">
        <livewire:filter-users />
        {{-- <livewire:create-user /> --}}
        <x-link-button hover="success" label="crear usuario" :href="route('user.create')" />
    </div>

    <div class="flex pb-2 border-b border-gray-300">
        <div class="w-1/6">
            <p>Nombre</p>
        </div>
        <div class="w-1/6">
            <p>Apellidos</p>
        </div>
        <div class="w-1/6">
            <p>Correo</p>
        </div>
        <div class="w-1/6 text-center">
            <p>Departamento</p>
        </div>
        <div class="w-1/6 text-center">
            <p>Permisos</p>
        </div>
        <div class="w-1/6 text-center">
            <p>Acciones</p>
        </div>
    </div>


    @forelse ($users as $user)
        <div class="flex items-center py-2 border-b border-gray-200">
            <div class="w-1/6">
                <p>{{ $user->name }}</p>
            </div>
            <div class="w-1/6">
                {{ $user->surname }}
            </div>
            <div class="w-1/6">
                <p>{{ $user->email }}</p>
            </div>
            <div class="w-1/6 text-center">
                <p>{{ \App\Enums\Departments::tryFrom($user->department)?->label() ?? 'Unknown' }}</p>
            </div>
            <div class="w-1/6 text-center">
                <p>{{ \App\Enums\Privileges::tryFrom($user->department)?->label() ?? 'Unknown' }}</p>
            </div>
            <div class="w-1/6 text-center flex justify-center">
                <x-icon-link icon="edit" href="{{ route('user.edit', $user->id) }}" />
                <x-icon-button icon="key" wire:click="resetPassword({{ $user->id }})" />
                <livewire:delete-user :userId="$user->id" :key="'delete-user-' . $user->id" />
            </div>
        </div>

    @empty
        <div class="text-center mt-4">
            <p class="text-gray-400">No hay usuarios para mostrar</p>
        </div>
    @endforelse
</div>

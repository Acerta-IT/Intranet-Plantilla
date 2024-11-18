<div>
    <div class="flex justify-between mb-10">
        <livewire:filter-users />
        <livewire:create-user />
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
        <div class="flex py-3 border-b border-gray-200">
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
            <div class="w-1/6 text-center">

            </div>
        </div>

    @empty
        <div class="text-center mt-4">
            <p class="text-gray-400">No hay usuarios para mostrar</p>
        </div>
    @endforelse
</div>

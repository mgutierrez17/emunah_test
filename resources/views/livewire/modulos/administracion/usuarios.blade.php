<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <input type="text" wire:model="search" class="rounded p-2 border" placeholder="Buscar usuario...">
        <button wire:click="abrirModal" class="bg-green-600 text-white px-4 py-2 rounded">+ Nuevo Usuario</button>
    </div>

    @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-2">
        {{ session('success') }}
    </div>
    @endif

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 text-left">ID</th>
                <th class="p-2 text-left">Nombre</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Rol</th>
                <th class="p-2 text-left">Estado</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr class="border-t">
                <td class="p-2">{{ $usuario->id }}</td>
                <td class="p-2">{{ $usuario->name }}</td>
                <td class="p-2">{{ $usuario->email }}</td>
                <td class="p-2">{{ $usuario->roles->pluck('name')->join(', ') }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 text-xs rounded {{ $usuario->estado ? 'bg-green-200 text-green-700' : 'bg-red-200 text-red-700' }}">
                        {{ $usuario->estado ? 'Activo' : 'Inactivo' }}
                    </span>
                </td>
                <td class="p-2 flex space-x-2 justify-center">
                    <button wire:click="editar({{ $usuario->id }})" class="text-blue-600">Editar</button>
                    <button wire:click="eliminar({{ $usuario->id }})" class="text-red-600" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>

    {{-- Modal --}}
    @if ($modal)
    <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-lg font-bold mb-4">{{ $modoEdicion ? 'Editar Usuario' : 'Nuevo Usuario' }}</h2>

            <div class="mb-2">
                <label>Nombre</label>
                <input type="text" wire:model.defer="name" class="w-full border p-2 rounded">
                @error('name') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            <div class="mb-2">
                <label>Email</label>
                <input type="email" wire:model.defer="email" class="w-full border p-2 rounded">
                @error('email') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            <div class="mb-2">
                <label>Contraseña</label>
                <input type="password" wire:model.defer="password" class="w-full border p-2 rounded">
                @error('password') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            <div class="mb-2">
                <label>Confirmar Contraseña</label>
                <input type="password" wire:model.defer="password_confirmation" class="w-full border p-2 rounded">
            </div>

            <div class="mb-2">
                <label>Rol</label>
                <select wire:model.defer="rol" class="w-full border p-2 rounded">
                    <option value="">-- Seleccione --</option>
                    @foreach ($roles as $id => $name)
                    <option value="{{ $name }}">{{ ucfirst($name) }}</option>
                    @endforeach
                </select>
                @error('rol') <small class="text-red-600">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label>Estado</label>
                <select wire:model.defer="estado" class="w-full border p-2 rounded">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button wire:click="$set('modal', false)" class="bg-gray-400 px-4 py-2 rounded text-white">Cancelar</button>
                <button wire:click="guardar" class="bg-blue-600 px-4 py-2 rounded text-white">Guardar</button>
            </div>
        </div>
    </div>
    @endif
</div>
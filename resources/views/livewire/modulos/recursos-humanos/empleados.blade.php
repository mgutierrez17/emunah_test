<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Gestión de Empleados</h1>
        @if (!$mostrarFormulario)
            <button wire:click="$set('mostrarFormulario', true)"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-user-plus mr-1"></i> Nuevo Empleado
            </button>
        @endif
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($mostrarFormulario)
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 bg-white p-4 shadow rounded">
            <div>
                <label class="block font-semibold">👤 Usuario</label>
                <select wire:model="user_id" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif>
                    <option value="">Seleccione un usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }} ({{ $usuario->email }})</option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📝Nombre</label>
                <input type="text" wire:model="nombre" placeholder="Ej. María" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('nombre')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📝Apellido</label>
                <input type="text" wire:model="apellido" placeholder="Ej. López" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('apellido')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📞Teléfono</label>
                <input type="text" wire:model="telefono" placeholder="Opcional" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('telefono')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📍Dirección</label>
                <input type="text" wire:model="direccion" placeholder="Opcional" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('direccion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📧Correo</label>
                <input type="email" wire:model="correo" placeholder="ejemplo@email.com"
                    class="w-full border rounded p-2" @if ($modo === 'ver') disabled @endif />
                @error('correo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🆔Nro. Carnet</label> <input type="text" wire:model="nro_carnet"
                    placeholder="Ej. 12345678" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('nro_carnet')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🎂Fecha de Nacimiento</label>
                <input type="date" wire:model="fecha_nacimiento" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('fecha_nacimiento')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📅Fecha de Contratación</label>
                <input type="date" wire:model="fecha_contratacion" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('fecha_contratacion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🏢Área</label>
                <select wire:model="area_id" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif>
                    <option value="">Seleccione</option>
                    @foreach ($areas as $a)
                        <option value="{{ $a->id }}">{{ $a->nombre }}</option>
                    @endforeach
                </select>
                @error('area_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🏬Almacén</label>
                <select wire:model="almacen_id" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif>
                    <option value="">Seleccione</option>
                    @foreach ($almacenes as $a)
                        <option value="{{ $a->id }}">{{ $a->nom_almacen }}</option>
                    @endforeach
                </select>
                @error('almacen_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🖼️Foto</label>
                <input type="file" wire:model="fotoFile" accept="image/png, image/jpeg" class="w-full border p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('fotoFile')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                @if ($fotoFile)
                    <img src="{{ $fotoFile->temporaryUrl() }}" class="mt-2 rounded shadow w-24 h-24 object-cover" />
                @elseif ($foto)
                    <img src="{{ asset($foto) }}" class="mt-2 rounded shadow w-24 h-24 object-cover" />
                @endif
            </div>
        </div>


        {{-- Botones --}}
        @if ($modo !== 'ver')
            <div class="mt-4 flex justify-end gap-2">
                <button wire:click="guardarEmpleado"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Guardar
                </button>
                <button wire:click="resetFormulario" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Cancelar
                </button>
            </div>
        @else
            <div class="mt-4 flex justify-end">
                <button wire:click="resetFormulario" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    <i class="fas fa-arrow-left mr-1"></i> Volver
                </button>
            </div>
        @endif
    @else
        <div class="mb-4">

            <div class="mb-4">
                <input type="text" wire:model.debounce.500ms="buscar" placeholder="Buscar por apellido..."
                    class="w-full border rounded p-2" />

                <div wire:loading.delay>
                    <span class="text-sm text-gray-500">🔄 Buscando...</span>
                </div>
            </div>

            @dump($buscar)



        </div>

        <div wire:loading.remove>
            <table class="w-full table-auto border shadow-sm text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-2 py-1">#</th>
                        <th class="px-2 py-1">Nombre</th>
                        <th class="px-2 py-1">Apellido</th>
                        <th class="px-2 py-1">Correo</th>
                        <th class="px-2 py-1">Área</th>
                        <th class="px-2 py-1">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($empleados as $empleado)
                        <tr>
                            <td class="px-2 py-1">{{ $loop->iteration }}</td>
                            <td class="px-2 py-1">{{ $empleado->nombre }}</td>
                            <td class="px-2 py-1">{{ $empleado->apellido }}</td>
                            <td class="px-2 py-1">{{ $empleado->correo }}</td>
                            <td class="px-2 py-1">{{ $empleado->area->nombre ?? '-' }}</td>
                            <td class="px-2 py-1">
                                <button wire:click="verEmpleado({{ $empleado->id }})"
                                    class="text-blue-600 hover:underline">👁️</button>
                                <button wire:click="editarEmpleado({{ $empleado->id }})"
                                    class="text-yellow-600 hover:underline">✏️</button>
                                <button wire:click="eliminarEmpleado({{ $empleado->id }})"
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('¿Eliminar este empleado?')">🗑️</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500">No hay empleados registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $empleados->links() }}
            </div>
        </div>
    @endif
</div>

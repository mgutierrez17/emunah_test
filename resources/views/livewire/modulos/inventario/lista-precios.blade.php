<div class="p-4">
    {{-- Alertas --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Botón para nuevo --}}
    @if (!$mostrarFormulario)
        <div class="text-right mb-4">
            <button wire:click="crear" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">➕
                Nueva Lista</button>
        </div>
    @endif

    {{-- Formulario --}}
    @if ($mostrarFormulario)
        <div class="bg-white p-4 shadow rounded mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">📝 Nombre</label>
                <input type="text" wire:model="nom_lista" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('nom_lista')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block font-semibold">📅 Fecha Inicio</label>
                <input type="date" wire:model="fecha_inicio" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('fecha_inicio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block font-semibold">📅 Fecha Final</label>
                <input type="date" wire:model="fecha_final" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif />
                @error('fecha_final')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label class="block font-semibold">🔘 Estado</label>
                <select wire:model="estado" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>
            <div class="col-span-2 flex justify-end gap-2">
                <button wire:click="guardar" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">💾
                    Guardar</button>
                <button wire:click="resetFormulario"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">🔙 Cancelar</button>
            </div>
        </div>
    @endif

    {{-- Tabla --}}
    <table class="w-full table-auto border shadow-sm text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-2 py-1">#</th>
                <th class="px-2 py-1">Nombre</th>
                <th class="px-2 py-1">Fechas</th>
                <th class="px-2 py-1">Estado</th>
                <th class="px-2 py-1">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listas as $index => $lista)
                <tr class="border-t">
                    <td class="px-2 py-1">{{ $index + 1 }}</td>
                    <td class="px-2 py-1">{{ $lista->nom_lista }}</td>
                    <td class="px-2 py-1">{{ $lista->fecha_inicio }} a {{ $lista->fecha_final }}</td>
                    <td class="px-2 py-1">
                        <span
                            class="px-2 py-1 rounded text-white text-xs {{ $lista->estado ? 'bg-green-600' : 'bg-red-500' }}">
                            {{ $lista->estado ? 'Activa' : 'Inactiva' }}
                        </span>
                    </td>
                    <td class="px-2 py-1 space-x-1">
                        <button wire:click="ver({{ $lista->id }})"
                            class="text-blue-600 hover:underline">👁️</button>
                        <button wire:click="editar({{ $lista->id }})"
                            class="text-yellow-600 hover:underline">✏️</button>
                        <button wire:click="eliminar({{ $lista->id }})" class="text-red-600 hover:underline"
                            onclick="return confirm('¿Eliminar esta lista?')">🗑️</button>
                        <a href="{{ route('lista-precios-productos', ['listaPrecioId' => $lista->id]) }}"
                            class="text-indigo-600 hover:underline">📦 Ver productos</a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-4">No hay listas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

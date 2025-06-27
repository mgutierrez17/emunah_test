<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">📂 Gestión de Categorías</h1>
        @if (!$mostrarFormulario)
            <button type="button" wire:click="$set('mostrarFormulario', true)"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-plus-circle mr-1"></i> Nueva Categoría
            </button>
        @endif
    </div>

    @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($mostrarFormulario)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-white p-4 shadow rounded">
            <div class="col-span-2">
                <label class="block font-semibold">🏷️ Nombre de la Categoría</label>
                <input type="text" wire:model="nom_categoria" class="w-full border rounded p-2"
                    placeholder="Ej. Productos de limpieza" @if ($modo === 'ver') disabled @endif>
                @error('nom_categoria')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-4 flex justify-end gap-2">
            @if ($modo !== 'ver')
                <button type="button" wire:click="guardarCategoria"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    💾 Guardar
                </button>
            @endif
            <button type="button" wire:click="resetFormulario"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                🔙 Cancelar
            </button>
        </div>
    @else
        <div class="mb-4">
            <input type="text" wire:model.debounce.500ms="buscar" placeholder="🔎 Buscar por nombre..."
                class="w-full border rounded p-2">
        </div>

        <table class="w-full table-auto border shadow-sm text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-2 py-1">#</th>
                    <th class="px-2 py-1">Nombre</th>
                    <th class="px-2 py-1">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $cat)
                    <tr>
                        <td class="px-2 py-1">
                            {{ ($categorias->currentPage() - 1) * $categorias->perPage() + $loop->iteration }}
                        </td>
                        <td class="px-2 py-1">{{ $cat->nom_categoria }}</td>
                        <td class="px-2 py-1">
                            <button wire:click="verCategoria({{ $cat->id }})"
                                class="text-blue-600 hover:underline">👁️</button>
                            <button wire:click="editarCategoria({{ $cat->id }})"
                                class="text-yellow-600 hover:underline">✏️</button>
                            <button wire:click="eliminarCategoria({{ $cat->id }})"
                                class="text-red-600 hover:underline"
                                onclick="return confirm('¿Desea eliminar esta categoría?')">🗑️</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500">No hay categorías registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $categorias->links('vendor.pagination.tailwind') }}
        </div>
    @endif
</div>

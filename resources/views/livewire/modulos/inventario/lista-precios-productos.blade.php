<div class="p-4">
    <div class="text-right mb-4">
        <a href="{{ route('lista-precios') }}" class="bg-indigo-700 text-white px-4 py-2 rounded hover:bg-indigo-800">
            📦 Volver a listas de precios ...
        </a>
    </div>

    <h1 class="text-2xl font-bold mb-4">📦 Lista de Precios - Productos</h1>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <input type="text" wire:model="buscar" placeholder="Buscar producto..." class="w-full border rounded p-2" />
    </div>

    <table class="w-full text-sm text-left border border-gray-300 shadow-sm rounded-md overflow-hidden">
        <thead class="bg-gray-200 text-gray-700">
            <tr>
                <th class="px-4 py-2 border-b border-gray-300">📦 Código</th>
                <th class="px-4 py-2 border-b border-gray-300">🛒 Producto</th>
                <th class="px-4 py-2 border-b border-gray-300">📋 Lista</th>
                <th class="px-4 py-2 border-b border-gray-300">💵 Precio</th>
                <th class="px-4 py-2 border-b border-gray-300 text-center">⚙️ Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            @forelse ($productosLista as $item)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $item->producto->codigo_venta }}</td>
                    <td class="px-4 py-2">{{ $item->producto->nom_producto }}</td>
                    <td class="px-4 py-2">{{ $item->lista->nom_lista }}</td>
                    <td class="px-4 py-2">Bs {{ number_format($item->precio, 2) }}</td>
                    <td class="px-4 py-2 text-center">
                        <button wire:click="ver({{ $item->id }})"
                            class="text-blue-600 hover:text-blue-800 transition duration-150">👁️ Ver</button>
                        <button wire:click="editar({{ $item->id }})"
                            class="ml-2 text-yellow-600 hover:text-yellow-800 transition duration-150">✏️
                            Editar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center px-4 py-4 text-gray-500">No se encontraron productos
                        relacionados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <div class="mt-3">
        {{ $productosLista->links() }}
    </div>

    @if ($formularioVisible && $productoSeleccionado)
        <div class="fixed top-0 right-0 w-full sm:w-1/3 h-full bg-white shadow-lg p-4 border-l z-50 overflow-auto">
            <h2 class="text-lg font-bold mb-2">{{ $modo === 'ver' ? 'Ver Producto' : 'Editar Precio' }}</h2>
            <p><strong>Producto:</strong> {{ $productoSeleccionado->producto->nom_producto }}</p>
            <p><strong>Lista:</strong> {{ $productoSeleccionado->lista->nom_lista }}</p>

            <div class="mt-2">
                <label class="block font-semibold">Precio</label>
                <input type="number" wire:model="precio" step="0.01" class="w-full border p-2 rounded"
                    @if ($modo === 'ver') disabled @endif>
                @error('precio')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4 flex justify-end gap-2">
                @if ($modo === 'editar')
                    <button wire:click="actualizar"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        💾 Guardar
                    </button>
                @endif
                <button wire:click="resetFormulario" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    🔙 Cerrar
                </button>
            </div>
        </div>
    @endif
</div>

<div class="p-4">
    <div class="flex justify-between items-center mb-4">
        @if (!$mostrarFormulario)
            <button type="button" wire:click="$set('mostrarFormulario', true)"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="fas fa-plus-circle mr-1"></i> Nuevo Producto
            </button>
        @endif
    </div>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($mostrarFormulario)
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 bg-white p-4 shadow rounded">
            <div>
                <label class="block font-semibold">📦 Categoría</label>
                <select wire:model="categoria_id" class="w-full border rounded p-2"
                    @if ($modo === 'ver') disabled @endif>
                    <option value="">Seleccione una categoría</option>
                    @foreach ($categorias as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->nom_categoria }}</option>
                    @endforeach
                </select>
                @error('categoria_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📝 Nombre del producto</label>
                <input type="text" wire:model="nom_producto" class="w-full border rounded p-2"
                    placeholder="Ej. Detergente Multiusos" @if ($modo === 'ver') disabled @endif />
                @error('nom_producto')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🔢 Código de Venta</label>
                <input type="text" wire:model="codigo_venta" class="w-full border rounded p-2" placeholder="Ej. P001"
                    @if ($modo === 'ver') disabled @endif />
                @error('codigo_venta')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-4 flex justify-end gap-2">
            @if ($modo !== 'ver')
                <button type="button" wire:click="guardarProducto"
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
            <input type="text" wire:model="buscar" placeholder="Buscar por nombre o código..."
                class="w-full border rounded p-2" />
            <button type="button" wire:click="resetFormulario"
                class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                🔙 Buscar
            </button>

        </div>


        @if (!$mostrarFormulario && !$mostrarAlmacenForm)
            <table class="w-full table-auto border shadow-sm text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-2 py-1">#</th>
                        <th class="px-2 py-1">Nombre</th>
                        <th class="px-2 py-1">Código</th>
                        <th class="px-2 py-1">Categoría</th>
                        <th class="px-2 py-1">Acciones</th>
                        <th class="px-2 py-1">Almacenes</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <td class="px-2 py-1">
                                {{ ($productos->currentPage() - 1) * $productos->perPage() + $loop->iteration }}</td>
                            <td class="px-2 py-1">{{ $producto->nom_producto }}</td>
                            <td class="px-2 py-1">{{ $producto->codigo_venta }}</td>
                            <td class="px-2 py-1">{{ $producto->categoria->nom_categoria ?? '-' }}</td>
                            <td class="px-2 py-1">
                                <button type="button" wire:click="verProducto({{ $producto->id }})"
                                    class="text-blue-600 hover:underline">👁️</button>
                                <button type="button" wire:click="editarProducto({{ $producto->id }})"
                                    class="text-yellow-600 hover:underline">✏️</button>
                                <button type="button" wire:click="eliminarProducto({{ $producto->id }})"
                                    class="text-red-600 hover:underline"
                                    onclick="return confirm('¿Eliminar este producto?')">🗑️</button>
                            </td>
                            <td class="px-2 py-1">
                                @foreach ($producto->almacenProductos as $almProd)
                                    <span class="text-xs">{{ $almProd->almacen->nom_almacen }}</span>
                                    <button type="button"
                                        wire:click="verAlmacenProducto({{ $producto->id }}, {{ $almProd->almacen_id }})"
                                        class="text-sm text-blue-500 hover:underline"> 👁️</button>
                                    <button type="button"
                                        wire:click="editarAlmacenProducto({{ $producto->id }}, {{ $almProd->almacen_id }})"
                                        class="text-sm text-blue-500 hover:underline"> ✏️</button>
                                @endforeach
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-gray-500">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                @if (method_exists($productos, 'links'))
                    <div wire:click="limpiarEstadoUI">
                        {{ $productos->links() }}
                    </div>
                @endif
            </div>
        @endif
    @endif
    @if ($mostrarAlmacenForm)
        <div wire:ignore
            class="fixed top-0 right-0 w-full sm:w-1/3 h-full bg-white shadow-lg z-50 p-4 overflow-auto border-l">
            <h2 class="text-lg font-bold mb-4">Editar Información por Almacén</h2>

            <p><strong>Producto:</strong> {{ $this->productoSeleccionado->nom_producto }}</p>
            <p><strong>Almacén:</strong> {{ $this->almacenSeleccionado->nom_almacen }}</p>

            <div class="mt-4">
                <label>Cantidad Óptima</label>
                <input type="number" wire:model="edit_cantidad_optima" class="w-full border rounded p-2"
                    @if ($modoAlmacen === 'ver') disabled @endif />
                @error('edit_cantidad_optima')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <label>Cantidad Mínima</label>
                <input type="number" wire:model="edit_cantidad_minima" class="w-full border rounded p-2"
                    @if ($modoAlmacen === 'ver') disabled @endif />
                @error('edit_cantidad_minima')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-2">
                <label>Ubicación</label>
                <input type="text" wire:model="edit_ubicacion" class="w-full border rounded p-2"
                    @if ($modoAlmacen === 'ver') disabled @endif />
                @error('edit_ubicacion')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4 flex justify-end gap-2">
                @if ($modoAlmacen === 'editar')
                    <button type="button" wire:click="actualizarAlmacenProducto"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Guardar
                    </button>
                @endif
                <button type="button" wire:click="$set('mostrarAlmacenForm', false)"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Cerrar
                </button>
            </div>
        </div>
    @endif
</div>

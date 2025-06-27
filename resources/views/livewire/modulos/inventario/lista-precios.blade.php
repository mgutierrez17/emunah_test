<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">📋 Administración de Listas de Precios</h1>

    {{-- Selector de lista de precios --}}
    <div class="flex items-center gap-4 mb-4">
        <select wire:model="listaSeleccionadaId" class="p-2 border rounded w-full max-w-md">
            <option value="">Seleccione una lista</option>
            @foreach ($listas as $lista)
            <option value="{{ $lista->id }}">{{ $lista->nom_lista }} ({{ $lista->fecha_inicio }} a {{ $lista->fecha_final }})</option>
            @endforeach
        </select>
        <button wire:click="mostrarFormulario('crear')" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">➕ Crear</button>
        @if($listaSeleccionadaId)
        <button wire:click="mostrarFormulario('editar')" class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600">✏️ Editar</button>
        <button wire:click="eliminarLista" class="bg-red-600 text-white px-3 py-2 rounded hover:bg-red-700"
            onclick="return confirm('¿Está seguro de eliminar esta lista?')">🗑️ Eliminar</button>
        @endif
    </div>

    {{-- Formulario de lista de precios --}}
    @if($mostrarFormularioLista)
    <div class="bg-white p-4 shadow rounded mb-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="font-semibold">📝 Nombre de Lista</label>
            <input type="text" wire:model="nom_lista" class="w-full border rounded p-2" />
            @error('nom_lista') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="font-semibold">📅 Fecha Inicio</label>
            <input type="date" wire:model="fecha_inicio" class="w-full border rounded p-2" />
            @error('fecha_inicio') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="font-semibold">📅 Fecha Final</label>
            <input type="date" wire:model="fecha_final" class="w-full border rounded p-2" />
            @error('fecha_final') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="font-semibold">🔘 Estado</label>
            <select wire:model="estado" class="w-full border rounded p-2">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            @error('estado') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="col-span-2 text-right mt-2">
            <button wire:click="guardarLista" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">💾 Guardar</button>
            <button wire:click="cancelarFormulario" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">🔙 Cancelar</button>
        </div>
    </div>
    @endif

    {{-- Botón para mostrar productos --}}
    @if($listaSeleccionadaId && !$mostrarFormularioLista)
    <div class="text-right mb-2">
        <button wire:click="mostrarProductos" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">📦 Ver productos</button>
    </div>
    @endif

    {{-- Tabla de productos con precios --}}
    @if($mostrarProductosLista)
    <div class="overflow-auto">
        <table class="min-w-full bg-white border text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Producto</th>
                    <th class="p-2 border">Código</th>
                    <th class="p-2 border">Precio</th>
                    <th class="p-2 border">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productosLista as $prod)
                <tr>
                    <td class="p-2 border">{{ $prod->nom_producto }}</td>
                    <td class="p-2 border">{{ $prod->codigo_venta }}</td>
                    <td class="p-2 border">
                        @if($modoProducto === 'editar' && $productoEditandoId === $prod->id)
                        <input type="number" step="0.01" wire:model="precio_editable" class="border rounded p-1 w-24" />
                        @else
                        {{ number_format($prod->pivot->precio, 2) }}
                        @endif
                    </td>
                    <td class="p-2 border">
                        @if($modoProducto === 'editar' && $productoEditandoId === $prod->id)
                        <button wire:click="guardarPrecio({{ $prod->id }})" class="text-green-600 hover:underline">💾 Guardar</button>
                        <button wire:click="cancelarEdicion" class="text-gray-600 hover:underline">✖ Cancelar</button>
                        @else
                        <button wire:click="verPrecio({{ $prod->id }})" class="text-blue-600 hover:underline">👁 Ver</button>
                        <button wire:click="editarPrecio({{ $prod->id }})" class="text-yellow-600 hover:underline">✏ Editar</button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 p-4">No hay productos asociados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>
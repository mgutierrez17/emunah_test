<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">🛒 Registro de Ventas</h1>

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (!$mostrarFormulario)
        <div class="mb-4 text-right">
            <button wire:click="verFormulario" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Nueva Venta
            </button>
        </div>
    @endif

    @if ($mostrarFormulario)
        <div class="bg-white p-4 rounded shadow mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="font-semibold">Cliente</label>
                <select wire:model="cliente_id" class="w-full border p-2 rounded" @disabled($modo === 'ver')>
                    <option value="">Seleccione</option>
                    @foreach ($clientes as $c)
                        <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                    @endforeach
                </select>
                @error('cliente_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Almacén</label>
                <select wire:model="almacen_id" class="w-full border p-2 rounded" @disabled($modo === 'ver')>
                    <option value="">Seleccione</option>
                    @foreach ($almacenes as $a)
                        <option value="{{ $a->id }}">{{ $a->nom_almacen }}</option>
                    @endforeach
                </select>
                @error('almacen_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Descripción</label>
                <input type="text" wire:model="descripcion" class="w-full border p-2 rounded"
                    @disabled($modo === 'ver')>
                @error('descripcion')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Fecha Pedido</label>
                <input type="date" wire:model="fecha_pedido" class="w-full border p-2 rounded"
                    @disabled($modo === 'ver')>
                @error('fecha_pedido')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Fecha Entrega</label>
                <input type="date" wire:model="fecha_entrega" class="w-full border p-2 rounded"
                    @disabled($modo === 'ver')>
                @error('fecha_entrega')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Comentarios</label>
                <textarea wire:model="comentarios" class="w-full border p-2 rounded" @disabled($modo === 'ver')></textarea>
            </div>

            <div class="md:col-span-2">
                <h2 class="text-lg font-bold mt-4 mb-2">Productos</h2>
                <table class="w-full text-sm border mb-3">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2">Producto</th>
                            <th class="p-2">Cantidad</th>
                            <th class="p-2">Precio Unitario</th>
                            <th class="p-2">Total</th>
                            <th class="p-2 text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $i => $prod)
                            <tr>
                                <td class="p-2">
                                    <select wire:model="productos.{{ $i }}.producto_id"
                                        class="w-full border p-1 rounded" @disabled($modo === 'ver')>
                                        <option value="">-- Seleccione --</option>
                                        @foreach ($productosLista as $producto)
                                            <option value="{{ $producto->id }}">{{ $producto->nom_producto }}</option>
                                        @endforeach
                                    </select>

                                    @error("productos.$i.producto_id")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="p-2">
                                    <input type="number" min="1"
                                        wire:model.lazy="productos.{{ $i }}.cantidad"
                                        @disabled($modo === 'ver') class="w-full border p-1 rounded" />
                                    @error("productos.$i.cantidad")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="p-2">
                                    <input type="number" step="0.01"
                                        wire:model.defer="productos.{{ $i }}.precio_unitario"
                                        class="border p-1 rounded w-full" @disabled($modo === 'ver')>
                                    @error("productos.$i.precio_unitario")
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="p-2 bg-gray-100">
                                    Bs {{ number_format($prod['precio_total'], 2) }}
                                </td>
                                <td class="p-2 text-center">
                                    @if ($modo !== 'ver')
                                        <button type="button" wire:click="quitarProducto({{ $i }})"
                                            class="text-red-600 hover:underline">🗑️</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-right text-lg font-semibold mt-4">
                    Total del pedido: Bs {{ number_format($total_pedido, 2) }}
                </div>

                @if ($modo !== 'ver')
                    <button wire:click="agregarProducto"
                        class="bg-gray-200 text-sm px-3 py-1 rounded hover:bg-gray-300">
                        ➕ Agregar producto
                    </button>
                @endif
            </div>

            <div class="col-span-2 flex justify-end gap-2 mt-2">
                @if ($modo !== 'ver')
                    <button wire:click="guardar" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        💾 Guardar
                    </button>
                @endif
                <button wire:click="cancelarFormulario"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    🔙 Cancelar
                </button>
            </div>
        </div>
    @endif

    {{-- Tabla de ventas registradas --}}
    @if (!$mostrarFormulario)
        <div class="overflow-x-auto">
            <table class="w-full text-sm border mt-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">#</th>
                        <th class="p-2">Cliente</th>
                        <th class="p-2">Fecha</th>
                        <th class="p-2">Estado</th>
                        <th class="p-2">Total</th>
                        <th class="p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $i => $venta)
                        <tr>
                            <td class="p-2">
                                {{ $loop->iteration + ($ventas->currentPage() - 1) * $ventas->perPage() }}</td>
                            <td class="p-2">{{ $venta->cliente->nombre }}</td>
                            <td class="p-2">{{ $venta->fecha_entrega }}</td>
                            <td class="p-2 capitalize">{{ str_replace('_', ' ', $venta->estado_pedido) }}</td>
                            <td class="p-2">Bs {{ number_format($venta->total_pedido, 2) }}</td>
                            <td class="p-2 text-center space-x-2">
                                <button wire:click="ver({{ $venta->id }})"
                                    class="text-blue-600 hover:underline">👁️</button>
                                <button wire:click="editar({{ $venta->id }})"
                                    class="text-yellow-600 hover:underline">✏️</button>
                                <button wire:click="eliminar({{ $venta->id }})"
                                    onclick="confirm('¿Eliminar pedido?') || event.stopImmediatePropagation()"
                                    class="text-red-600 hover:underline">🗑️</button>
                                <select wire:change="actualizarEstado({{ $venta->id }}, $event.target.value)"
                                    class="p-1 border rounded">
                                    @php
                                        $estado = $venta->estado_pedido;
                                        $opciones = [];

                                        if ($estado === 'pedido') {
                                            $opciones = ['entrega', 'cancelado'];
                                        } elseif ($estado === 'entrega') {
                                            $opciones = ['devolucion', 'facturado'];
                                        } elseif ($estado === 'facturado') {
                                            $opciones = ['pagado', 'anulado'];
                                        }
                                    @endphp

                                    <option value="">--</option>
                                    @foreach ($opciones as $op)
                                        <option value="{{ $op }}"
                                            {{ $venta->estado_pedido === $op ? 'selected' : '' }}>
                                            {{ ucfirst($op) }}
                                        </option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $ventas->links() }}
            </div>
        </div>
    @endif
</div>

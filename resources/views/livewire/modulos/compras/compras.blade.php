<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">📦 Registro de Compras</h1>

    {{-- Mensaje de éxito --}}
    @if (session()->has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para nuevo --}}
    @if (!$mostrarFormulario)
        <div class="mb-4 text-right">
            <button wire:click="verFormulario" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Nueva compra
            </button>
        </div>
    @endif

    {{-- Formulario de registro/edición --}}
    @if ($mostrarFormulario)
        <div class="bg-white p-4 rounded shadow mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="font-semibold">Proveedor</label>
                <select wire:model.defer="proveedor_id" @disabled($modo === 'ver') class="w-full border p-2 rounded">
                    <option value="">Seleccione</option>
                    @foreach ($proveedores as $p)
                        <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                    @endforeach
                </select>
                @error('proveedor_id')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Descripción</label>
                <input type="text" wire:model.defer="descripcion" @disabled($modo === 'ver')
                    class="w-full border p-2 rounded">
                @error('descripcion')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Fecha Compra</label>
                <input type="date" wire:model.defer="fecha_compra" @disabled($modo === 'ver')
                    class="w-full border p-2 rounded">
                @error('fecha_compra')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">Fecha Ingreso</label>
                <input type="date" wire:model.defer="fecha_ingreso" @disabled($modo === 'ver')
                    class="w-full border p-2 rounded">
                @error('fecha_ingreso')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            @if ($modo === 'ver')
                <div>
                    <label class="font-semibold">Estado</label>
                    <select wire:model.defer="estado_ingreso" class="w-full border p-2 rounded" disabled>
                        <option value="pedido">Pedido</option>
                        <option value="entrada_mercaderia">Entrada Mercadería</option>
                        <option value="facturado">Facturado</option>
                    </select>
                </div>
            @endif

            <div class="md:col-span-2">
                <label class="font-semibold">Comentarios</label>
                <textarea wire:model.defer="comentarios" @disabled($modo === 'ver') class="w-full border p-2 rounded"></textarea>
            </div>

            <div class="md:col-span-2">
                <h2 class="text-lg font-bold mt-4 mb-2">🧾 Productos</h2>
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
                                        @disabled($modo === 'ver') class="w-full border p-1 rounded">
                                        <option value="">--</option>
                                        @foreach ($productosLista as $producto)
                                            <option value="{{ $producto->id }}">{{ $producto->nom_producto }}</option>
                                        @endforeach
                                    </select>
                                    @error("productos.$i.producto_id")
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="p-2">
                                    <input type="number" min="1"
                                        wire:model.lazy="productos.{{ $i }}.cantidad"
                                        @disabled($modo === 'ver') class="w-full border p-1 rounded" />
                                    @error("productos.$i.cantidad")
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="p-2">
                                    <input type="number" step="0.01"
                                        wire:model.lazy="productos.{{ $i }}.precio_unitario"
                                        @disabled($modo === 'ver') class="w-full border p-1 rounded" />
                                    @error("productos.$i.precio_unitario")
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </td>
                                <td class="p-2 bg-gray-100">
                                    Bs {{ number_format($prod['precio_total'], 2) }}
                                </td>
                                <td class="p-2 text-center">
                                    @if ($modo !== 'ver')
                                        <button wire:click="quitarProducto({{ $i }})"
                                            class="text-red-600">🗑️</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-right text-lg font-semibold">
                    Total del pedido: Bs {{ number_format($total_pedido, 2) }}
                </div>
                @if ($modo !== 'ver')
                    <button wire:click="agregarProducto"
                        class="bg-gray-200 text-sm px-3 py-1 rounded hover:bg-gray-300 mt-2">
                        ➕ Agregar producto
                    </button>
                @endif
            </div>

            <div class="col-span-2 flex justify-end gap-2 mt-4">
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

    {{-- Tabla de compras registradas --}}
    @if (!$mostrarFormulario)
        <div class="overflow-x-auto">
            <table class="w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">#</th>
                        <th class="p-2">Proveedor</th>
                        <th class="p-2">Fecha</th>
                        <th class="p-2">Estado</th>
                        <th class="p-2">Total</th>
                        <th class="p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guias as $index => $guia)
                        <tr>
                            <td class="p-2">{{ $loop->iteration + ($guias->currentPage() - 1) * $guias->perPage() }}
                            </td>
                            <td class="p-2">{{ $guia->proveedor->nombre }}</td>
                            <td class="p-2">{{ $guia->fecha_ingreso }}</td>
                            <td class="p-2 capitalize">{{ str_replace('_', ' ', $guia->estado_ingreso) }}</td>
                            <td class="p-2">Bs {{ number_format($guia->total_pedido, 2) }}</td>
                            <td class="p-2 text-center space-x-2">
                                <button wire:click="ver({{ $guia->id }})"
                                    class="text-blue-600 hover:underline">👁️</button>
                                <button wire:click="editar({{ $guia->id }})"
                                    class="text-yellow-600 hover:underline">✏️</button>
                                <button wire:click="eliminar({{ $guia->id }})"
                                    onclick="confirm('¿Eliminar compra?') || event.stopImmediatePropagation()"
                                    class="text-red-600 hover:underline">🗑️</button>

                                @php
                                    $opciones = [];
                                    if ($guia->estado_ingreso === 'pedido') {
                                        $opciones = ['entrada_mercaderia' => 'Entrada', 'cancelado' => 'Cancelado'];
                                    } elseif ($guia->estado_ingreso === 'entrada_mercaderia') {
                                        $opciones = ['devolucion' => 'Devolución', 'facturado' => 'Facturado'];
                                    } elseif ($guia->estado_ingreso === 'facturado') {
                                        $opciones = ['pagado' => 'Pagado', 'anulado' => 'Anulado'];
                                    }
                                @endphp

                                <select wire:change="actualizarEstado({{ $guia->id }}, $event.target.value)"
                                    class="p-1 rounded border">
                                    <option value="">Cambiar estado</option>
                                    @foreach ($opciones as $valor => $label)
                                        <option value="{{ $valor }}">{{ $label }}</option>
                                    @endforeach
                                </select>

                            </td>
                        </tr>
                    @endforeach

                    @if ($guias->isEmpty())
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">No se registraron compras.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="mt-4">
                {{ $guias->links() }}
            </div>
        </div>
    @endif
</div>

<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">🏢 Administración de Proveedores</h1>

    {{-- Botón para mostrar el formulario --}}
    @if (!$formularioVisible)
        <div class="mb-4 text-right">
            <button wire:click="mostrarFormulario" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Nuevo proveedor
            </button>
        </div>
    @endif

    {{-- Formulario de proveedor --}}
    @if ($formularioVisible)
        <div class="bg-white border shadow p-4 rounded mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="font-semibold">📛 Nombre</label>
                <input type="text" wire:model.defer="nombre" class="w-full border p-2 rounded"
                    @if ($modo === 'ver') disabled @endif>
                @error('nombre')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">🏢 Razón Social</label>
                <input type="text" wire:model.defer="razon_social" class="w-full border p-2 rounded"
                    @if ($modo === 'ver') disabled @endif>
                @error('razon_social')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">🧾 NIT</label>
                <input type="text" wire:model.defer="nit" class="w-full border p-2 rounded"
                    @if ($modo === 'ver') disabled @endif>
                @error('nit')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">📬 Dirección</label>
                <input type="text" wire:model.defer="direccion" class="w-full border p-2 rounded"
                    @if ($modo === 'ver') disabled @endif>
                @error('direccion')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">📞 Teléfono</label>
                <input type="text" wire:model.defer="telefono" class="w-full border p-2 rounded"
                    @if ($modo === 'ver') disabled @endif>
                @error('telefono')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="font-semibold">📧 Correo</label>
                <input type="email" wire:model.defer="correo" class="w-full border p-2 rounded"
                    @if ($modo === 'ver') disabled @endif>
                @error('correo')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Saldos solo en modo ver --}}
            @if ($modo === 'ver')
                <div>
                    <label class="font-semibold">Saldo Pedidos</label>
                    <input type="text" value="Bs {{ number_format($saldo_pedido, 2) }}"
                        class="w-full border p-2 rounded bg-gray-100" disabled>
                </div>
                <div>
                    <label class="font-semibold">Saldo Ingresos</label>
                    <input type="text" value="Bs {{ number_format($saldo_ingresos ?? 0, 2) }}"
                        class="w-full border p-2 rounded bg-gray-100" disabled>
                </div>
                <div>
                    <label class="font-semibold">Saldo Deuda</label>
                    <input type="text" value="Bs {{ number_format($saldo_deuda, 2) }}"
                        class="w-full border p-2 rounded bg-gray-100" disabled>
                </div>
            @endif

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

    {{-- Tabla solo si el formulario está oculto --}}
    @if (!$formularioVisible)
        {{-- Buscador --}}
        <div class="mb-3">
            <input type="text" wire:model="buscar" placeholder="🔍 Buscar proveedor..."
                class="w-full md:w-1/3 border p-2 rounded shadow-sm">
        </div>

        {{-- Tabla de proveedores --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm border">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-2">#</th>
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Razón Social</th>
                        <th class="p-2">Teléfono</th>
                        <th class="p-2">Correo</th>
                        <th class="p-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proveedores as $index => $item)
                        <tr class="border-t">
                            <td class="p-2">
                                {{ $loop->iteration + ($proveedores->currentPage() - 1) * $proveedores->perPage() }}
                            </td>
                            <td class="p-2">{{ $item->nombre }}</td>
                            <td class="p-2">{{ $item->razon_social }}</td>
                            <td class="p-2">{{ $item->telefono }}</td>
                            <td class="p-2">{{ $item->correo }}</td>
                            <td class="p-2 text-center space-x-2">
                                <button wire:click="ver({{ $item->id }})"
                                    class="text-blue-600 hover:underline">👁️</button>
                                <button wire:click="editar({{ $item->id }})"
                                    class="text-yellow-600 hover:underline">✏️</button>
                                <button wire:click="eliminar({{ $item->id }})"
                                    onclick="confirm('¿Eliminar proveedor?') || event.stopImmediatePropagation()"
                                    class="text-red-600 hover:underline">🗑️</button>
                            </td>
                        </tr>
                    @endforeach

                    @if ($proveedores->isEmpty())
                        <tr>
                            <td colspan="6" class="p-4 text-center text-gray-500">No se encontraron proveedores.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="mt-4">
            {{ $proveedores->links() }}
        </div>
    @endif
</div>

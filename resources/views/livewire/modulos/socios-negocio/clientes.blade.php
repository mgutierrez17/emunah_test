<div class="p-4">

    <h1 class="text-2xl font-bold mb-4">👥 Administración de Clientes</h1>

    {{-- Botón crear cliente --}}
    @if (!$formularioVisible)
        <div class="text-right mb-4">
            <button wire:click="mostrarFormulario" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Nuevo Cliente
            </button>
        </div>
    @endif

    {{-- Formulario de registro --}}
    @if ($formularioVisible)
        <div class="bg-white shadow-md rounded p-4 mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">📛 Nombre</label>
                <input type="text" wire:model="nombre" @if ($modo === 'ver') disabled @endif
                    class="w-full border rounded p-2">
                @error('nombre')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🏢 Razón Social</label>
                <input type="text" wire:model="razon_social" @if ($modo === 'ver') disabled @endif
                    class="w-full border rounded p-2">
                @error('razon_social')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">🧾 NIT</label>
                <input type="text" wire:model="nit" @if ($modo === 'ver') disabled @endif
                    class="w-full border rounded p-2">
                @error('nit')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📬 Dirección</label>
                <input type="text" wire:model="direccion" @if ($modo === 'ver') disabled @endif
                    class="w-full border rounded p-2">
                @error('direccion')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📞 Teléfono</label>
                <input type="text" wire:model="telefono" @if ($modo === 'ver') disabled @endif
                    class="w-full border rounded p-2">
                @error('telefono')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-semibold">📧 Correo</label>
                <input type="email" wire:model="correo" @if ($modo === 'ver') disabled @endif
                    class="w-full border rounded p-2">
                @error('correo')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Saldos (solo visibles en modo ver) --}}
            @if ($modo === 'ver')
                <div>
                    <label class="block font-semibold">📌 Saldo Pedido</label>
                    <input type="text" value="Bs {{ number_format($saldo_pedido, 2) }}" disabled
                        class="w-full border rounded p-2 bg-gray-100">
                </div>
                <div>
                    <label class="block font-semibold">📌 Saldo Entregas</label>
                    <input type="text" value="Bs {{ number_format($saldo_entregas, 2) }}" disabled
                        class="w-full border rounded p-2 bg-gray-100">
                </div>
                <div>
                    <label class="block font-semibold">📌 Saldo Deuda</label>
                    <input type="text" value="Bs {{ number_format($saldo_deuda, 2) }}" disabled
                        class="w-full border rounded p-2 bg-gray-100">
                </div>
            @endif

            <div class="col-span-2 flex justify-end gap-2 mt-2">
                @if ($modo !== 'ver')
                    <button wire:click="guardar" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">💾
                        Guardar</button>
                @endif
                <button wire:click="cancelarFormulario"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">🔙 Cancelar</button>
            </div>
        </div>
    @endif

    {{-- Buscador --}}
    @if (!$formularioVisible)
        <div class="mb-3 flex justify-between">
            <input type="text" wire:model="buscar" placeholder="🔍 Buscar por nombre o NIT..."
                class="border p-2 rounded w-full md:w-1/3">
        </div>

        {{-- Tabla de clientes --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded shadow-sm text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-3 py-2 text-left">#</th>
                        <th class="px-3 py-2 text-left">Nombre</th>
                        <th class="px-3 py-2 text-left">Razón Social</th>
                        <th class="px-3 py-2 text-left">NIT</th>
                        <th class="px-3 py-2 text-left">Teléfono</th>
                        <th class="px-3 py-2 text-left">Correo</th>
                        <th class="px-3 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($clientes as $index => $cliente)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-3 py-2">{{ ($clientes->firstItem() ?? 0) + $index }}</td>
                            <td class="px-3 py-2">{{ $cliente->nombre }}</td>
                            <td class="px-3 py-2">{{ $cliente->razon_social }}</td>
                            <td class="px-3 py-2">{{ $cliente->nit }}</td>
                            <td class="px-3 py-2">{{ $cliente->telefono }}</td>
                            <td class="px-3 py-2">{{ $cliente->correo }}</td>
                            <td class="px-3 py-2 text-center">
                                <button wire:click="ver({{ $cliente->id }})"
                                    class="text-blue-600 hover:underline">👁️</button>
                                <button wire:click="editar({{ $cliente->id }})"
                                    class="text-yellow-600 hover:underline mx-2">✏️</button>
                                <button wire:click="eliminar({{ $cliente->id }})"
                                    onclick="return confirm('¿Está seguro?')"
                                    class="text-red-600 hover:underline">🗑️</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-2 text-gray-500">No se encontraron clientes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $clientes->links() }}
            </div>
        </div>
    @endif

</div>

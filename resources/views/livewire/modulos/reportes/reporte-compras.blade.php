<div class="p-6 max-w-7xl mx-auto">
    <h2 class="text-xl font-bold mb-4">📋 Reporte de Compras</h2>

    <div class="bg-white rounded shadow p-4 mb-6 grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="font-semibold">Fecha inicio</label>
            <input type="date" wire:model="fecha_inicio" class="w-full border p-2 rounded">
        </div>

        <div>
            <label class="font-semibold">Fecha fin</label>
            <input type="date" wire:model="fecha_fin" class="w-full border p-2 rounded">
        </div>

        <div class="flex items-end">
            <button wire:click="buscar" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">🔍
                Buscar</button>
        </div>
    </div>

    @if (count($resultados))

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border shadow-sm text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2">Fecha</th>
                        <th class="p-2">Proveedor</th>
                        <th class="p-2">Categoría</th>
                        <th class="p-2">Código</th>
                        <th class="p-2">Producto</th>
                        <th class="p-2 text-right">Cantidad</th>
                        <th class="p-2 text-right">P. Unitario</th>
                        <th class="p-2 text-right">Total Pedido</th>
                        <th class="p-2">Estado</th>
                        <th class="p-2">Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultados as $r)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-2">{{ $r->fecha_compra }}</td>
                            <td class="p-2">{{ $r->proveedor }}</td>
                            <td class="p-2">{{ $r->categoria }}</td>
                            <td class="p-2">{{ $r->codigo_venta }}</td>
                            <td class="p-2">{{ $r->nom_producto }}</td>
                            <td class="p-2 text-right">{{ $r->cantidad }}</td>
                            <td class="p-2 text-right">Bs {{ number_format($r->precio_unitario, 2) }}</td>
                            <td class="p-2 text-right">Bs {{ number_format($r->total_pedido, 2) }}</td>
                            <td class="p-2 capitalize">{{ str_replace('_', ' ', $r->estado_ingreso) }}</td>
                            <td class="p-2">{{ $r->usuario }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif($fecha_inicio && $fecha_fin)
        <p class="text-gray-500 mt-4">No se encontraron resultados.</p>
    @endif
</div>

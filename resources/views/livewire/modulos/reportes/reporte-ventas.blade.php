<div class="p-6 max-w-7xl mx-auto">
    <h2 class="text-xl font-bold mb-4 text-center">📊 Reporte de Ventas por Rango de Fechas</h2>

    <div class="flex flex-col md:flex-row gap-4 mb-4 items-end justify-center">
        <div>
            <label class="block font-semibold">📅 Fecha Inicio</label>
            <input type="date" wire:model="fechaInicio" class="border p-2 rounded w-full">
        </div>
        <div>
            <label class="block font-semibold">📅 Fecha Fin</label>
            <input type="date" wire:model="fechaFin" class="border p-2 rounded w-full">
        </div>
        <div>
            <button wire:click="buscar" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                🔍 Buscar
            </button>
        </div>
    </div>

    @if ($resultados && count($resultados))
        <div class="overflow-x-auto mt-4 bg-white shadow rounded p-4">
            <table class="w-full text-sm border">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2">Cliente</th>
                        <th class="p-2">Fecha</th>
                        <th class="p-2">Estado</th>
                        <th class="p-2">Código</th>
                        <th class="p-2">Producto</th>
                        <th class="p-2">Categoría</th>
                        <th class="p-2 text-right">Cantidad</th>
                        <th class="p-2 text-right">Precio Unitario</th>
                        <th class="p-2 text-right">Subtotal</th>
                        <th class="p-2">Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultados as $pedido)
                        @foreach ($pedido->productos as $detalle)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="p-2">{{ $pedido->cliente->nombre }}</td>
                                <td class="p-2">{{ $pedido->fecha_pedido }}</td>
                                <td class="p-2 capitalize">{{ str_replace('_', ' ', $pedido->estado_pedido) }}</td>
                                <td class="p-2">{{ $detalle->producto->codigo_venta ?? '-' }}</td>
                                <td class="p-2">{{ $detalle->producto->nom_producto }}</td>
                                <td class="p-2">{{ $detalle->producto->categoria->nom_categoria ?? '-' }}</td>
                                <td class="p-2 text-right">{{ $detalle->cantidad }}</td>
                                <td class="p-2 text-right">Bs {{ number_format($detalle->precio_unitario, 2) }}</td>
                                <td class="p-2 text-right">Bs {{ number_format($detalle->precio_total, 2) }}</td>
                                <td class="p-2">{{ $pedido->usuarioCreador->name ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    @elseif($fechaInicio && $fechaFin)
        <p class="text-gray-600 mt-4 text-center">⚠️ No hay ventas registradas en el rango seleccionado.</p>
    @endif
</div>

<div>
    <div class="p-4">
        <div class="flex flex-col md:flex-row gap-4 items-center mb-4">
            <select wire:model="almacen_id" class="border p-2 rounded w-full md:w-1/3">
                <option value="">🔽 Seleccione un almacén</option>
                @foreach ($almacenes as $almacen)
                    <option value="{{ $almacen->id }}">{{ $almacen->nom_almacen }}</option>
                @endforeach
            </select>
            <button wire:click="buscar" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                🔍 Buscar
            </button>

            @if ($almacen_id)
                <a href="{{ route('reporte.productos.pdf', ['almacen_id' => $almacen_id]) }}" target="_blank"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    🧾 Exportar PDF
                </a>
            @endif
        </div>

        @if ($resultados && count($resultados))
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border text-sm shadow">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-3 py-2 text-left">Código</th>
                            <th class="px-3 py-2 text-left">Producto</th>
                            <th class="px-3 py-2 text-left">Almacén</th>
                            <th class="px-3 py-2 text-right">Stock</th>
                            <th class="px-3 py-2 text-right">Cantidad Óptima</th>
                            <th class="px-3 py-2 text-right">Cantidad Mínima</th>
                            <th class="px-3 py-2 text-left">Ubicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $item)
                            @php
                                $stock = $item->stock;
                                $optima = $item->cantidad_optima;
                                $minima = $item->cantidad_minima;
                                $color = '';

                                if ($stock < $minima) {
                                    $color = 'text-red-600 font-bold';
                                } elseif ($stock == $optima) {
                                    $color = 'text-green-600 font-semibold';
                                } elseif ($stock > $minima && $stock < $optima) {
                                    $color = 'text-yellow-600 font-semibold';
                                }
                            @endphp
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-3 py-2">{{ $item->producto->codigo_venta }}</td>
                                <td class="px-3 py-2">{{ $item->producto->nom_producto }}</td>
                                <td class="px-3 py-2">{{ $item->almacen->nom_almacen }}</td>
                                <td class="px-3 py-2 text-right {{ $color }}">{{ $stock }}</td>
                                <td class="px-3 py-2 text-right">{{ $optima }}</td>
                                <td class="px-3 py-2 text-right">{{ $minima }}</td>
                                <td class="px-3 py-2">{{ $item->ubicacion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @elseif($almacen_id)
            <p class="text-gray-500 mt-4">No hay productos registrados en este almacén.</p>
        @endif
    </div>
</div>

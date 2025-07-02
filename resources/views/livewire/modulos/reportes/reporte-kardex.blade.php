<div class="p-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold mb-4 text-center">📊 Reporte de Movimientos (Kardex)</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
        <select wire:model="producto_id" class="border p-2 rounded">
            <option value="">🔽 Producto</option>
            @foreach ($productos as $p)
                <option value="{{ $p->id }}">{{ $p->nom_producto }}</option>
            @endforeach
        </select>

        <select wire:model="almacen_id" class="border p-2 rounded">
            <option value="">🏬 Todos los almacenes</option>
            @foreach ($almacenes as $a)
                <option value="{{ $a->id }}">{{ $a->nom_almacen }}</option>
            @endforeach
        </select>

        <input type="date" wire:model="fecha_inicio" class="border p-2 rounded">
        <input type="date" wire:model="fecha_fin" class="border p-2 rounded">
    </div>

    <div class="text-right mb-4">
        <button wire:click="buscar" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            🔍 Buscar
        </button>
    </div>

    @if ($resultados && count($resultados))
        <table class="w-full text-sm border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2">📦 Producto</th>
                    <th class="p-2">📅 Fecha</th>
                    <th class="p-2">🔁 Movimiento</th>
                    <th class="p-2 text-right">📥 Ingreso</th>
                    <th class="p-2 text-right">📤 Salida</th>
                    <th class="p-2">👤 Usuario</th>
                    <th class="p-2">🏬 Almacén</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resultados as $r)
                    <tr class="border-t">
                        <td class="p-2">{{ $r->producto->nom_producto }}</td>
                        <td class="p-2">{{ $r->fecha_entrada }}</td>
                        <td class="p-2">
                            @if ($r->guia_ingreso_id)
                                🟢 Ingreso
                            @elseif ($r->pedido_id)
                                🔴 Salida
                            @endif
                        </td>
                        <td class="p-2 text-right">
                            {{ $r->cantidad > 0 ? $r->cantidad : '' }}
                        </td>
                        <td class="p-2 text-right">
                            {{ $r->cantidad < 0 ? abs($r->cantidad) : '' }}
                        </td>
                        <td class="p-2">{{ $r->usuario->name ?? 'N/D' }}</td>
                        <td class="p-2">{{ $r->almacen->nom_almacen }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($producto_id)
        <p class="text-center text-gray-500 mt-6">No se encontraron movimientos para este producto.</p>
    @endif
</div>

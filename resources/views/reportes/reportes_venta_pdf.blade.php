<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo {
            width: 120px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        th,
        td {
            border: 1px solid #444;
            padding: 5px;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" class="logo">
        <h2>Reporte de Ventas</h2>
        <p>Desde {{ $fechaInicio }} hasta {{ $fechaFin }}</p>
        <p>Generado por: {{ $usuario->name }} | Fecha: {{ $fecha }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Código</th>
                <th>Cant.</th>
                <th>P. Unit.</th>
                <th>Total</th>
                <th>Registrado por</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $i => $venta)
                @foreach ($venta->detalles as $detalle)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $venta->cliente->nombre }}</td>
                        <td>{{ $venta->fecha_pedido }}</td>
                        <td>{{ ucfirst($venta->estado_pedido) }}</td>
                        <td>{{ $detalle->producto->nom_producto }}</td>
                        <td>{{ $detalle->producto->categoria->nombre ?? 'N/A' }}</td>
                        <td>{{ $detalle->producto->codigo_venta }}</td>
                        <td>{{ $detalle->cantidad }}</td>
                        <td>Bs {{ number_format($detalle->precio_unitario, 2) }}</td>
                        <td>Bs {{ number_format($detalle->precio_total, 2) }}</td>
                        <td>{{ $venta->user->name ?? 'Sistema' }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>

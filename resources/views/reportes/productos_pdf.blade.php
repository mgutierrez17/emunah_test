<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            margin: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            width: 130px;
        }

        .info {
            text-align: right;
            font-size: 11px;
        }

        .title {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 6px 4px;
            text-align: left;
        }

        thead {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" class="logo" alt="Logo">
        <div class="info">
            <p><strong>Fecha de Exportación:</strong> {{ now()->format('d/m/Y') }}</p>
            <p><strong>Almacén:</strong> {{ $almacen->nom_almacen }}</p>
        </div>
        <div><strong>Dirección:</strong> {{ $almacen->direccion_almacen ?? 'N/D' }}</div>
        <div><strong>Empleado:</strong> {{ $empleado }}</div>


        <div class="title">📦 Reporte de Productos por Almacén</div>

        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Almacén</th>
                    <th>Stock</th>
                    <th>Óptima</th>
                    <th>Mínima</th>
                    <th>Ubicación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    @php
                        $datos = $producto->almacenProductos->first();
                    @endphp
                    @if ($datos)
                        <tr>
                            <td>{{ $producto->codigo_venta }}</td>
                            <td>{{ $producto->nom_producto }}</td>
                            <td>{{ $almacen->nom_almacen }}</td>
                            <td>{{ $datos->stock }}</td>
                            <td>{{ $datos->cantidad_optima }}</td>
                            <td>{{ $datos->cantidad_minima }}</td>
                            <td>{{ $datos->ubicacion }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
</body>

</html>

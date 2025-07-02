<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #333;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #4A5568;
            padding-bottom: 10px;
        }

        .header img {
            height: 60px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            color: #2D3748;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 5px;
            font-size: 14px;
            color: #2B6CB0;
            border-bottom: 1px solid #CBD5E0;
        }

        .info-table {
            width: 100%;
            margin-bottom: 10px;
        }

        .info-table td {
            padding: 3px;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .products-table th {
            background-color: #EDF2F7;
            border: 1px solid #CBD5E0;
            padding: 6px;
            font-weight: bold;
            text-align: left;
        }

        .products-table td {
            border: 1px solid #CBD5E0;
            padding: 6px;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 10px;
        }

        .footer {
            margin-top: 40px;
            font-size: 10px;
            text-align: center;
            color: #718096;
        }
    </style>
</head>

<body>

    {{-- Encabezado --}}
    <div class="header">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo">
        <div class="title">{{ $titulo }}</div>
    </div>

    {{-- Información del pedido --}}
    <div class="section-title"> Datos del Pedido</div>
    <table class="info-table">
        <tr>
            <td><strong>Cliente:</strong></td>
            <td>{{ $pedido->cliente->nombre }}</td>
            <td><strong>Fecha de Pedido:</strong></td>
            <td>{{ $pedido->fecha_pedido }}</td>
        </tr>
        <tr>
            <td><strong>Almacén:</strong></td>
            <td>{{ $pedido->almacen->nom_almacen ?? '' }}</td>
            <td><strong>Fecha de Entrega:</strong></td>
            <td>{{ $pedido->fecha_entrega }}</td>
        </tr>
        <tr>
            <td><strong>Estado:</strong></td>
            <td>{{ ucfirst($pedido->estado_pedido) }}</td>
            <td><strong>Comentarios:</strong></td>
            <td>{{ $pedido->comentarios }}</td>
        </tr>
    </table>

    {{-- Tabla de productos --}}
    <div class="section-title">Productos</div>
    <table class="products-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario (Bs)</th>
                <th>Total (Bs)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedido->detalles as $i => $detalle)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $detalle->producto->nom_producto }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ number_format($detalle->precio_unitario, 2) }}</td>
                    <td>{{ number_format($detalle->precio_total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Total del pedido --}}
    <div class="total">
        Total del Pedido: Bs {{ number_format($pedido->total_pedido, 2) }}
    </div>

    {{-- Pie de página --}}
    <div class="footer">
        Documento generado el {{ now()->format('d/m/Y H:i') }}
    </div>

</body>

</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReporteVentasPdfController extends Controller
{
    public function exportarPDF($fechaInicio, $fechaFin)
    {
        $ventas = Pedido::with(['cliente', 'detalles.producto.categoria', 'user'])
            ->whereBetween('fecha_pedido', [$fechaInicio, $fechaFin])
            ->get();

        $usuario = Auth::user();
        $fecha = now()->format('d/m/Y');

        $pdf = Pdf::loadView('reportes.reporte_ventas_pdf', compact('ventas', 'fechaInicio', 'fechaFin', 'usuario', 'fecha'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('reporte_ventas.pdf');
    }
}

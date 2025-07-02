<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteVentasController extends Controller
{
    public function exportarPDF($id)
    {
        $pedido = Pedido::with(['cliente', 'almacen', 'detalles.producto'])->findOrFail($id);

        // Definir título dinámico
        $titulos = [
            'pedido' => 'Pedido de Cliente',
            'entrega' => 'Nota de Entrega',
            'facturado' => 'Nota de Venta',
            'anulado' => 'Pedido Anulado',
            'cancelado' => 'Pedido Anulado',
        ];
        $titulo = $titulos[$pedido->estado_pedido] ?? 'Pedido';

        $pdf = Pdf::loadView('pdf.venta', compact('pedido', 'titulo'));
        return $pdf->stream("pedido_{$pedido->id}.pdf");
    }
}

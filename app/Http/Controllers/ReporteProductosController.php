<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use App\Models\Producto;
use PDF;
use Auth;

class ReporteProductosController extends Controller
{
    public function exportarPDF($almacen_id)
    {
        $almacen = Almacen::findOrFail($almacen_id);
        $productos = Producto::with(['almacenProductos' => function ($q) use ($almacen_id) {
            $q->where('almacen_id', $almacen_id);
        }])->get();

        $empleado = Auth::user()->empleado->nombre ?? Auth::user()->name;
        $fecha = now()->format('d/m/Y');

        $pdf = PDF::loadView('reportes.productos_pdf', compact('productos', 'almacen', 'empleado', 'fecha'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('reporte_productos_' . $almacen->nom_almacen . '.pdf');
    }
}

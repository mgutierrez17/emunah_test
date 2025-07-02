<?php

namespace App\Livewire\Modulos\Reportes;

use Livewire\Component;
use App\Models\GuiaIngreso;
use Illuminate\Support\Facades\DB;

class ReporteCompras extends Component
{
    public $fecha_inicio, $fecha_fin;
    public $resultados = [];

    public function render()
    {
        return view('livewire.modulos.reportes.reporte-compras')->layout('layouts.app');
    }

    public function buscar()
    {
        $this->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $this->resultados = DB::table('guia_ingreso_detalles as d')
            ->join('guia_ingresos as g', 'd.guia_ingreso_id', '=', 'g.id')
            ->join('productos as p', 'd.producto_id', '=', 'p.id')
            ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
            ->join('users as u', 'g.created_by', '=', 'u.id')
            ->join('proveedores as prov', 'g.proveedor_id', '=', 'prov.id')
            ->select(
                'g.id as guia_id',
                'g.fecha_compra',
                'g.estado_ingreso',
                'prov.nombre as proveedor',
                'c.nom_categoria as categoria',
                'p.codigo_venta',
                'p.nom_producto',
                'd.cantidad',
                'd.precio_unitario',
                'g.total_pedido',
                'u.name as usuario'
            )
            ->whereBetween('g.fecha_compra', [$this->fecha_inicio, $this->fecha_fin])
            ->orderBy('g.fecha_compra', 'desc')
            ->get();
    }
}

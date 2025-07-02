<?php

namespace App\Livewire\Modulos\Reportes;

use Livewire\Component;
use App\Models\Kardex;
use App\Models\Producto;
use App\Models\Almacen;
use Livewire\WithPagination;

class ReporteKardex extends Component
{
    use WithPagination;

    public $producto_id, $almacen_id, $fecha_inicio, $fecha_fin;
    public $resultados = [];

    public function buscar()
    {
        $this->validate([
            'producto_id' => 'required|exists:productos,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio'
        ]);

        $query = Kardex::with(['producto', 'almacen', 'usuario'])
            ->where('producto_id', $this->producto_id)
            ->whereBetween('fecha_entrada', [$this->fecha_inicio, $this->fecha_fin]);

        if ($this->almacen_id) {
            $query->where('almacen_id', $this->almacen_id);
        }

        $this->resultados = $query->orderBy('fecha_entrada', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.modulos.reportes.reporte-kardex', [
            'productos' => \App\Models\Producto::orderBy('nom_producto')->get(),
            'almacenes' => \App\Models\Almacen::orderBy('nom_almacen')->get(),
        ])->layout('layouts.app');
    }
}

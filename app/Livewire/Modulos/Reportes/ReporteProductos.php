<?php

namespace App\Livewire\Modulos\Reportes;

use Livewire\Component;
use App\Models\Almacen;
use App\Models\AlmacenProducto;

class ReporteProductos extends Component
{
    public $almacen_id;
    public $almacenes = [];
    public $resultados = [];
    public $almacenSeleccionado = null;

    public function mount()
    {
        $this->almacenes = Almacen::orderBy('nom_almacen')->get();
    }

    public function buscar()
    {
        $this->validate([
            'almacen_id' => 'required|exists:almacenes,id'
        ]);

        $this->resultados = AlmacenProducto::with('producto', 'almacen')
            ->where('almacen_id', $this->almacen_id)
            ->get();
    }

    public function render()
    {
        return view('livewire.modulos.reportes.reporte-productos')->layout('layouts.app');
    }
}

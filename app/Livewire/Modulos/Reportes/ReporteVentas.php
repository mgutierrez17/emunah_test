<?php

namespace App\Livewire\Modulos\Reportes;

use Livewire\Component;
use App\Models\Pedido;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ReporteVentas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $fechaInicio, $fechaFin;
    public $resultados = [];

    public function render()
    {
        return view('livewire.modulos.reportes.reporte-ventas')->layout('layouts.app');
    }

    public function buscar()
    {
        $this->validate([
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after_or_equal:fechaInicio',
        ]);

        $this->resultados = Pedido::with(['cliente', 'usuarioCreador', 'productos.producto.categoria'])
            ->whereBetween('fecha_pedido', [$this->fechaInicio, $this->fechaFin])
            ->orderBy('fecha_pedido', 'desc')
            ->get();
    }
}

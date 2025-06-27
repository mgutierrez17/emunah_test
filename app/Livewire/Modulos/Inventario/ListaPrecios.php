<?php

namespace App\Livewire\Modulos\Inventario;

use Livewire\Component;
use App\Models\ListaPrecio;
use App\Models\ListaPrecioProducto;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ListaPrecios extends Component
{
    public $lista_id;
    public $nom_lista;
    public $estado = true;
    public $fecha_inicio;
    public $fecha_final;

    public $mostrarFormularioLista = false;
    public $mostrarProductosLista = false;
    public $listaSeleccionadaId;
    public $listas = [];

    public function mount()
    {
        $this->listarListas();
    }

    public function render()
    {
        return view('livewire.modulos.inventario.lista-precios');
    }

    public function listarListas()
    {
        $this->listas = ListaPrecio::orderByDesc('created_at')->get();
    }

    public function mostrarProductos()
    {
        $this->mostrarProductosLista = true;
    }

    public function mostrarFormulario()
    {
        $this->mostrarFormularioLista = true;
    }

    public function cancelarFormulario()
    {
        $this->resetFormulario();
        $this->mostrarFormularioLista = false;
    }

    public function resetFormulario()
    {
        $this->reset([
            'lista_id',
            'nom_lista',
            'estado',
            'fecha_inicio',
            'fecha_final',
            'mostrarFormularioLista',
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function guardarLista()
    {
        $this->validate([
            'nom_lista' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ], [
            'nom_lista.required' => 'El nombre de la lista es obligatorio.',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_final.required' => 'La fecha final es obligatoria.',
            'fecha_final.after_or_equal' => 'La fecha final debe ser igual o posterior a la fecha de inicio.',
        ]);

        // Validar que no haya solapamiento de fechas
        $conflicto = ListaPrecio::where(function ($q) {
            $q->whereBetween('fecha_inicio', [$this->fecha_inicio, $this->fecha_final])
                ->orWhereBetween('fecha_final', [$this->fecha_inicio, $this->fecha_final])
                ->orWhere(function ($query) {
                    $query->where('fecha_inicio', '<=', $this->fecha_inicio)
                        ->where('fecha_final', '>=', $this->fecha_final);
                });
        })
            ->when($this->lista_id, fn($q) => $q->where('id', '!=', $this->lista_id))
            ->exists();

        if ($conflicto) {
            $this->addError('fecha_inicio', 'Ya existe una lista con fechas que se solapan.');
            return;
        }

        $data = [
            'nom_lista' => $this->nom_lista,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'estado' => $this->estado,
        ];

        if ($this->lista_id) {
            $lista = ListaPrecio::findOrFail($this->lista_id);
            $lista->update(array_merge($data, ['updated_by' => Auth::id()]));
        } else {
            $lista = ListaPrecio::create(array_merge($data, ['created_by' => Auth::id()]));

            // Crear precios por producto
            $productos = Producto::all();
            foreach ($productos as $producto) {
                ListaPrecioProducto::create([
                    'lista_precio_id' => $lista->id,
                    'producto_id' => $producto->id,
                    'precio' => 0,
                    'created_by' => Auth::id(),
                ]);
            }
        }

        $this->resetFormulario();
        $this->listarListas();
    }
}

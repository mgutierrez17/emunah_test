<?php

namespace App\Livewire\Modulos\Inventario;

use App\Models\ListaPrecio;
use App\Models\ListaPrecioProducto;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ListaPrecios extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $lista_id, $nom_lista, $estado = true, $fecha_inicio, $fecha_final;
    public $mostrarFormulario = false, $modo = 'crear';

    public function render()
    {
        $listas = ListaPrecio::latest()->paginate(10);
        return view('livewire.modulos.inventario.lista-precios', compact('listas'));
    }

    public function crear()
    {
        $this->resetFormulario();
        $this->modo = 'crear';
        $this->mostrarFormulario = true;
    }

    public function ver($id)
    {
        $this->cargarLista($id);
        $this->modo = 'ver';
        $this->mostrarFormulario = true;
    }

    public function editar($id)
    {
        $this->cargarLista($id);
        $this->modo = 'editar';
        $this->mostrarFormulario = true;
    }

    public function cargarLista($id)
    {
        $lista = ListaPrecio::findOrFail($id);
        $this->lista_id = $lista->id;
        $this->nom_lista = $lista->nom_lista;
        $this->estado = $lista->estado;
        $this->fecha_inicio = $lista->fecha_inicio;
        $this->fecha_final = $lista->fecha_final;
    }

    public function guardar()
    {
        $this->validate([
            'nom_lista' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        // Validación de solapamiento de fechas
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
            $this->addError('fecha_inicio', 'Existe una lista con fechas que se solapan.');
            return;
        }

        $data = [
            'nom_lista' => $this->nom_lista,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'estado' => $this->estado ?? true,
        ];

        if ($this->modo === 'editar') {
            $lista = ListaPrecio::findOrFail($this->lista_id);
            $lista->update(array_merge($data, ['updated_by' => Auth::id()]));
        } else {
            $lista = ListaPrecio::create(array_merge($data, ['created_by' => Auth::id()]));

            // Relacionar todos los productos a esta nueva lista con precio = 0
            $productos = \App\Models\Producto::all();
            foreach ($productos as $producto) {
                ListaPrecioProducto::firstOrCreate([
                    'lista_precio_id' => $lista->id,
                    'producto_id' => $producto->id,
                ], [
                    'precio' => 0,
                    'created_by' => Auth::id(),
                ]);
            }
        }

        $this->resetFormulario();
    }

    public function eliminar($id)
    {
        $lista = ListaPrecio::findOrFail($id);
        $lista->delete();
        session()->flash('success', 'Lista eliminada correctamente.');
    }

    public function resetFormulario()
    {
        $this->reset(['lista_id', 'nom_lista', 'estado', 'fecha_inicio', 'fecha_final', 'mostrarFormulario']);
        $this->resetValidation();
    }

    public function verProductos($id)
    {
        return redirect()->route('lista-precios-productos', ['lista' => $id]);
    }
}

<?php

namespace App\Livewire\Modulos\Inventario;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ListaPrecioProducto;
use App\Models\Producto;
use App\Models\ListaPrecio;
use Illuminate\Support\Facades\Auth;

class ListaPreciosProductos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $id;

    public $precio;
    public $producto_id;
    public $lista_precio_id;
    public $modo = 'crear';
    public $formularioVisible = false;
    public $productoSeleccionado;
    public $buscar = '';

    public $listaId;

    public function mount($listaPrecioId)
    {
        $this->lista_precio_id = $listaPrecioId;
    }

    public function render()
    {
        // ✅ Eliminar temporalmente el dd para permitir que la vista cargue
        // dd($this->lista_precio_id); 

        $productosLista = ListaPrecioProducto::with(['producto', 'lista'])
            ->where('lista_precio_id', $this->lista_precio_id) // 🔹 Aquí el filtro correcto
            ->whereHas('producto', function ($q) {
                $q->where('nom_producto', 'like', '%' . $this->buscar . '%');
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.modulos.inventario.lista-precios-productos', compact('productosLista'))
            ->layout('layouts.app');
    }

    public function ver($id)
    {
        $this->formularioVisible = true;
        $this->modo = 'ver';
        $this->cargarDatos($id);
    }

    public function editar($id)
    {
        $this->formularioVisible = true;
        $this->modo = 'editar';
        $this->cargarDatos($id);
    }

    public function cargarDatos($id)
    {
        $item = ListaPrecioProducto::findOrFail($id);
        $this->producto_id = $item->producto_id;
        $this->lista_precio_id = $item->lista_precio_id;
        $this->precio = $item->precio;
        $this->productoSeleccionado = $item;
    }

    public function actualizar()
    {
        $this->validate([
            'precio' => 'required|numeric|min:0',
        ]);

        $this->productoSeleccionado->update([
            'precio' => $this->precio,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Precio actualizado correctamente.');
        $this->resetFormulario();
    }

    public function resetFormulario()
    {
        $this->reset([
            'precio',
            'producto_id',
            'modo',
            'formularioVisible',
            'productoSeleccionado',
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}

<?php

namespace App\Livewire\Modulos\Inventario;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Almacen;
use App\Models\AlmacenProducto;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Traits\ReseteoAlCambiarPagina;

class Productos extends Component
{
    use WithPagination, ReseteoAlCambiarPagina;

    public $producto_id, $categoria_id, $nom_producto, $codigo_venta;
    public $modo = 'crear', $mostrarFormulario = false, $buscar = '';
    protected $paginationTheme = 'tailwind';

    /////////////////////////////// variables para formulario de almacenes
    public $mostrarAlmacenForm = false;
    //    public $productoSeleccionado, $almacenSeleccionado;
    public $producto_id_seleccionado, $almacen_id_seleccionado;
    public $edit_cantidad_optima, $edit_cantidad_minima, $edit_ubicacion;
    public $modoAlmacen = 'ver'; // puede ser 'ver' o 'editar'


    protected function rules()
    {
        return [
            'categoria_id' => 'required|exists:categorias,id',
            'nom_producto' => 'required|string|max:200',
            'codigo_venta' => 'required|string|max:50|unique:productos,codigo_venta,' . $this->producto_id,
        ];
    }

    protected $messages = [
        'categoria_id.required' => 'Seleccione una categoría.',
        'nom_producto.required' => 'El nombre es obligatorio.',
        'codigo_venta.required' => 'El código de venta es obligatorio.',
        'codigo_venta.unique' => 'El código ya está registrado.',
    ];

    public function render()
    {
        $productos = Producto::with(['categoria', 'almacenProductos.almacen'])
            ->where('nom_producto', 'like', '%' . $this->buscar . '%')
            ->orWhere('codigo_venta', 'like', '%' . $this->buscar . '%')
            ->orderBy('nom_producto')->paginate(10);

        $categorias = Categoria::orderBy('nom_categoria')->get();

        return view('livewire.modulos.inventario.productos', compact('productos', 'categorias'))
            ->layout('layouts.app');
    }

    public function guardarProducto()
    {
        $this->validate();

        if ($this->producto_id) {
            $producto = Producto::findOrFail($this->producto_id);
            $producto->update([
                'categoria_id' => $this->categoria_id,
                'nom_producto' => $this->nom_producto,
                'codigo_venta' => $this->codigo_venta,
                'updated_by' => Auth::id(),
            ]);
        } else {
            $producto = Producto::create([
                'categoria_id' => $this->categoria_id,
                'nom_producto' => $this->nom_producto,
                'codigo_venta' => $this->codigo_venta,
                'created_by' => Auth::id(),
            ]);

            // Registrar producto en todos los almacenes
            $almacenes = Almacen::all();
            foreach ($almacenes as $almacen) {
                AlmacenProducto::create([
                    'producto_id' => $producto->id,
                    'almacen_id' => $almacen->id,
                    'stock' => 0,
                    'cantidad_optima' => 0,
                    'cantidad_minima' => 0,
                    'ubicacion' => '-',
                    'created_by' => Auth::id(),
                ]);
            }
        }

        $this->resetFormulario();
    }

    public function editarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $this->producto_id = $producto->id;
        $this->categoria_id = $producto->categoria_id;
        $this->nom_producto = $producto->nom_producto;
        $this->codigo_venta = $producto->codigo_venta;

        $this->modo = 'editar';
        $this->mostrarFormulario = true;
        $this->resetErrorBag();
    }

    public function verProducto($id)
    {
        $this->editarProducto($id);
        $this->modo = 'ver';
    }

    public function eliminarProducto($id)
    {
        $producto = Producto::with(['pedidos', 'compras'])->findOrFail($id);

        if ($producto->pedidos->count() > 0 || $producto->compras->count() > 0) {
            session()->flash('error', '❌ No se puede eliminar el producto porque está asociado a pedidos o compras.');
            return;
        }

        $producto->delete();
        session()->flash('success', '✅ Producto eliminado correctamente.');
    }

    public function resetFormulario()
    {
        $this->reset([
            'producto_id',
            'categoria_id',
            'nom_producto',
            'codigo_venta',
            'modo',
            'mostrarFormulario'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }


    ///////////// manejo de almacenes
    public function editarAlmacenProducto($productoId, $almacenId)
    {
        $this->producto_id_seleccionado = $productoId;
        $this->almacen_id_seleccionado = $almacenId;

        $pivot = AlmacenProducto::where('producto_id', $productoId)
            ->where('almacen_id', $almacenId)->first();

        if ($pivot) {
            $this->edit_cantidad_optima = $pivot->cantidad_optima;
            $this->edit_cantidad_minima = $pivot->cantidad_minima;
            $this->edit_ubicacion = $pivot->ubicacion;
        }

        $this->modoAlmacen = 'editar';
        $this->mostrarAlmacenForm = true;
    }



    public function actualizarAlmacenProducto()
    {
        $this->validate([
            'edit_cantidad_optima' => 'required|integer|min:0',
            'edit_cantidad_minima' => 'required|integer|min:0',
            'edit_ubicacion' => 'required|string|max:50',
        ]);

        AlmacenProducto::updateOrCreate(
            [
                'producto_id' => $this->producto_id_seleccionado,
                'almacen_id' => $this->almacen_id_seleccionado,
            ],
            [
                'cantidad_optima' => $this->edit_cantidad_optima,
                'cantidad_minima' => $this->edit_cantidad_minima,
                'ubicacion' => $this->edit_ubicacion,
                'updated_by' => auth()->id(),
            ]
        );

        $this->mostrarAlmacenForm = false;
    }

    public function getProductoSeleccionadoProperty()
    {
        return Producto::find($this->producto_id_seleccionado);
    }

    public function getAlmacenSeleccionadoProperty()
    {
        return Almacen::find($this->almacen_id_seleccionado);
    }

    public function verAlmacenProducto($productoId, $almacenId)
    {
        $this->producto_id_seleccionado = $productoId;
        $this->almacen_id_seleccionado = $almacenId;

        $pivot = AlmacenProducto::where('producto_id', $productoId)
            ->where('almacen_id', $almacenId)->first();

        if ($pivot) {
            $this->edit_cantidad_optima = $pivot->cantidad_optima;
            $this->edit_cantidad_minima = $pivot->cantidad_minima;
            $this->edit_ubicacion = $pivot->ubicacion;
        }

        $this->modoAlmacen = 'ver';
        $this->mostrarAlmacenForm = true;
    }

    public function updatingPage()
    {
        $this->limpiarEstadoUI();
        $this->resetFormulario(); // si tienes un método para resetear datos
        $this->mostrarFormulario = false;

        // Si tienes modales por almacén o similares:
        $this->mostrarAlmacenForm = false ?? false;
    }

    public function limpiarEstadoUI()
    {
        $this->reset([
            'mostrarFormulario',
            'mostrarAlmacenForm',
            'modo',
            'modoAlmacen',
            'producto_id',
            'categoria_id',
            'nom_producto',
            'codigo_venta',
            'producto_id_seleccionado',
            'almacen_id_seleccionado',
            'edit_cantidad_optima',
            'edit_cantidad_minima',
            'edit_ubicacion',
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }
}

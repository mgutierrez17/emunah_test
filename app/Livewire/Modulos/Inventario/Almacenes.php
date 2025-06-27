<?php

namespace App\Livewire\Modulos\Inventario;

use App\Models\Almacen;
use App\Models\Producto;
use App\Models\AlmacenProducto;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Almacenes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $almacen_id, $nom_almacen, $direccion_almacen;
    public $buscar = '', $modo = 'crear', $mostrarFormulario = false;

    protected function rules()
    {
        return [
            'nom_almacen' => 'required|string|max:50',
            'direccion_almacen' => 'required|string|max:200',
        ];
    }

    protected $messages = [
        'nom_almacen.required' => 'El nombre del almacén es obligatorio.',
        'direccion_almacen.required' => 'La dirección es obligatoria.',
    ];

    public function render()
    {
        $almacenes = Almacen::where('nom_almacen', 'like', '%' . $this->buscar . '%')
            ->orderBy('nom_almacen')
            ->paginate(5);

        return view('livewire.modulos.inventario.almacenes', compact('almacenes'))
            ->layout('layouts.app');
    }

    public function guardarAlmacen()
    {
        $this->validate();

        // Detectar si es nuevo
        $esNuevo = is_null($this->almacen_id);

        // Crear o actualizar el almacén
        $almacen = Almacen::updateOrCreate(
            ['id' => $this->almacen_id],
            ['nom_almacen' => $this->nom_almacen, 'direccion_almacen' => $this->direccion_almacen]
        );

        // Si es nuevo, relacionar con todos los productos existentes
        if ($esNuevo) {
            $productos = Producto::all();
            foreach ($productos as $producto) {
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

        session()->flash('success', $esNuevo ? 'Almacén creado y vinculado a productos.' : 'Almacén actualizado.');
        $this->resetFormulario();
    }

    public function editarAlmacen($id)
    {
        $almacen = Almacen::findOrFail($id);
        $this->almacen_id = $almacen->id;
        $this->nom_almacen = $almacen->nom_almacen;
        $this->direccion_almacen = $almacen->direccion_almacen;
        $this->modo = 'editar';
        $this->mostrarFormulario = true;
    }

    public function verAlmacen($id)
    {
        $this->editarAlmacen($id);
        $this->modo = 'ver';
    }

    public function eliminarAlmacen($id)
    {
        $almacen = Almacen::findOrFail($id);

        $registrosRelacionados = $almacen->almacenProductos()->where(function ($q) {
            $q->where('stock', '>', 0)
                ->orWhere('cantidad_optima', '>', 0)
                ->orWhere('cantidad_minima', '>', 0)
                ->orWhere('ubicacion', '!=', '-');
        })->exists();

        if ($registrosRelacionados) {
            session()->flash('error', 'No se puede eliminar el almacén. Existen productos relacionados con stock o configuración.');
            return;
        }

        $almacen->delete();
        session()->flash('success', 'Almacén eliminado correctamente.');
    }


    public function resetFormulario()
    {
        $this->reset(['almacen_id', 'nom_almacen', 'direccion_almacen', 'modo', 'mostrarFormulario']);
        $this->resetValidation();
    }
}

<?php

namespace App\Livewire\Modulos\Inventario;

use App\Models\Almacen;
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

        Almacen::updateOrCreate(
            ['id' => $this->almacen_id],
            ['nom_almacen' => $this->nom_almacen, 'direccion_almacen' => $this->direccion_almacen]
        );

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
        Almacen::findOrFail($id)->delete();
        $this->resetFormulario();
    }

    public function resetFormulario()
    {
        $this->reset(['almacen_id', 'nom_almacen', 'direccion_almacen', 'modo', 'mostrarFormulario']);
        $this->resetValidation();
    }
}

<?php

namespace App\Livewire\Modulos\Inventario;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;

class Categorias extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $categoria_id, $nom_categoria, $modo = 'crear', $mostrarFormulario = false, $buscar = '';

    protected function rules()
    {
        return [
            'nom_categoria' => 'required|string|max:50|unique:categorias,nom_categoria,' . $this->categoria_id
        ];
    }

    protected $messages = [
        'nom_categoria.required' => 'El nombre es obligatorio.',
        'nom_categoria.unique' => 'Ya existe una categoría con este nombre.',
    ];

    public function render()
    {
        $categorias = Categoria::where('nom_categoria', 'like', '%' . $this->buscar . '%')
            ->orderBy('nom_categoria')->paginate(5);

        return view('livewire.modulos.inventario.categorias', compact('categorias'))
            ->layout('layouts.app');
    }

    public function guardarCategoria()
    {
        $this->validate();

        Categoria::updateOrCreate(
            ['id' => $this->categoria_id],
            ['nom_categoria' => $this->nom_categoria]
        );

        $this->resetFormulario();
    }

    public function editarCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nom_categoria = $categoria->nom_categoria;
        $this->modo = 'editar';
        $this->mostrarFormulario = true;
    }

    public function verCategoria($id)
    {
        $this->editarCategoria($id);
        $this->modo = 'ver';
    }

    public function eliminarCategoria($id)
    {
        $categoria = Categoria::withCount('productos')->findOrFail($id);

        if ($categoria->productos_count > 0) {
            session()->flash('error', 'No se puede eliminar esta categoría porque tiene productos asociados.');
            return;
        }

        $categoria->delete();
        session()->flash('success', 'Categoría eliminada correctamente.');
        $this->resetFormulario();
    }


    public function resetFormulario()
    {
        $this->reset([
            'categoria_id',
            'nom_categoria',
            'modo',
            'mostrarFormulario'
        ]);
        $this->resetValidation();
    }
}

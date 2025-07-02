<?php

namespace App\Livewire\Modulos\Administracion;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class Usuarios extends Component
{
    use WithPagination;

    public $search = '';
    public $modal = false;
    public $modoEdicion = false;
    public $usuario_id;
    public $name, $email, $password, $password_confirmation, $estado = true, $rol;
    public $roles = [];
    

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'rol' => 'required'
    ];

    public function mount()
    {
        $this->roles = Role::pluck('name', 'id');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $usuarios = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.modulos.administracion.usuarios', compact('usuarios'));
    }

    public function abrirModal()
    {
        $this->reset(['usuario_id', 'name', 'email', 'password', 'password_confirmation', 'rol']);
        $this->modoEdicion = false;
        $this->modal = true;
    }

    public function editar($id)
    {
        $usuario = User::findOrFail($id);
        $this->usuario_id = $usuario->id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->estado = $usuario->estado;
        $this->rol = $usuario->roles->first()?->name ?? null;

        $this->modoEdicion = true;
        $this->modal = true;
    }

    public function guardar()
    {
        $this->validate();

        if ($this->usuario_id) {
            $usuario = User::find($this->usuario_id);
            $usuario->update([
                'name' => $this->name,
                'email' => $this->email,
                'estado' => $this->estado
            ]);

            if ($this->password) {
                $usuario->update(['password' => Hash::make($this->password)]);
            }

            $usuario->syncRoles([$this->rol]);
            session()->flash('success', 'Usuario actualizado.');
        } else {
            $usuario = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'estado' => $this->estado
            ]);

            $usuario->assignRole($this->rol);
            session()->flash('success', 'Usuario creado.');
        }

        $this->modal = false;
    }

    public function eliminar($id)
    {
        User::find($id)?->delete();
        session()->flash('success', 'Usuario eliminado.');
    }
}

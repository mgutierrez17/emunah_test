<?php

namespace App\Livewire\Modulos\RecursosHumanos;

use App\Models\Empleado;
use App\Models\User;
use App\Models\Area;
use App\Models\Almacen;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Empleados extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    // Propiedades del formulario
    public $empleado_id, $user_id, $nombre, $apellido, $telefono, $direccion;
    public $correo, $nro_carnet, $fecha_nacimiento, $fecha_contratacion;
    public $almacen_id, $area_id, $foto;

    // Estados del formulario
    public $modoCreacion = false, $modoEdicion = false, $modoLectura = false;
    public $mostrarFormulario = false;

    // Datos auxiliares
    public $buscar = '';
    public $usuarios, $almacenes, $areas;

    public function mount()
    {
        $this->usuarios = User::all();
        $this->almacenes = Almacen::all();
        $this->areas = Area::all();
    }

    public function render()
    {
        $empleados = Empleado::with(['almacen', 'area', 'user'])
            ->when($this->buscar, function ($query) {
                $query->where(function ($subquery) {
                    $subquery->where('nombre', 'like', '%' . $this->buscar . '%')
                        ->orWhere('apellido', 'like', '%' . $this->buscar . '%');
                });
            })
            ->orderBy('apellido')
            ->paginate(10);

        // Solo usuarios no asignados a ningún empleado
        if ($this->modoEdicion && $this->user_id) {
            $usuarios = \App\Models\User::where(function ($query) {
                $query->whereDoesntHave('empleado')
                    ->orWhere('id', $this->user_id);
            })->orderBy('name')->get();
        } else {
            $usuarios = \App\Models\User::whereDoesntHave('empleado')
                ->orderBy('name')->get();
        }

        $almacenes = \App\Models\Almacen::orderBy('nom_almacen')->get();
        $areas = \App\Models\Area::orderBy('nombre')->get();
//        dd($usuarios);
        return view('livewire.modulos.recursos-humanos.empleados', compact('empleados', 'usuarios', 'almacenes', 'areas'))
            ->layout('layouts.app');
    }


    public function nuevo()
    {
        $this->resetForm();
        $this->modoCreacion = true;
        $this->modoEdicion = false;
        $this->modoLectura = false;
    }

    public function cancelar()
    {
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset([
            'empleado_id',
            'user_id',
            'nombre',
            'apellido',
            'telefono',
            'direccion',
            'correo',
            'nro_carnet',
            'fecha_nacimiento',
            'fecha_contratacion',
            'almacen_id',
            'area_id',
            'foto',
            'modoCreacion',
            'modoEdicion',
            'modoLectura'
        ]);
        $this->resetValidation();
    }

    public function guardar()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'nro_carnet' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'fecha_contratacion' => 'required|date',
            'almacen_id' => 'required|exists:almacenes,id',
            'area_id' => 'required|exists:areas,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $fotoPath = null;
        if ($this->foto) {
            $fotoPath = $this->foto->store('public/img/empleados');
        }

        $empleado = Empleado::create([
            'user_id' => $this->user_id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'correo' => $this->correo,
            'nro_carnet' => $this->nro_carnet,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_contratacion' => $this->fecha_contratacion,
            'almacen_id' => $this->almacen_id,
            'area_id' => $this->area_id,
            'foto' => $fotoPath ? str_replace('public/', '', $fotoPath) : null,
            'created_by' => auth()->id(),
        ]);

        session()->flash('success', 'Empleado registrado correctamente.');
        $this->cancelar();
    }

    public function editar($id)
    {
        $empleado = Empleado::findOrFail($id);
        $this->empleado_id = $empleado->id;
        $this->user_id = $empleado->user_id;
        $this->nombre = $empleado->nombre;
        $this->apellido = $empleado->apellido;
        $this->telefono = $empleado->telefono;
        $this->direccion = $empleado->direccion;
        $this->correo = $empleado->correo;
        $this->nro_carnet = $empleado->nro_carnet;
        $this->fecha_nacimiento = $empleado->fecha_nacimiento;
        $this->fecha_contratacion = $empleado->fecha_contratacion;
        $this->almacen_id = $empleado->almacen_id;
        $this->area_id = $empleado->area_id;
        $this->foto = null;
        $this->modoEdicion = true;
    }

    public function actualizar()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'nro_carnet' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'fecha_contratacion' => 'required|date',
            'almacen_id' => 'required|exists:almacenes,id',
            'area_id' => 'required|exists:areas,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $empleado = Empleado::findOrFail($this->empleado_id);

        if ($this->foto) {
            if ($empleado->foto && Storage::exists('public/' . $empleado->foto)) {
                Storage::delete('public/' . $empleado->foto);
            }
            $fotoPath = $this->foto->store('public/img/empleados');
            $empleado->foto = str_replace('public/', '', $fotoPath);
        }

        $empleado->update([
            'user_id' => $this->user_id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'correo' => $this->correo,
            'nro_carnet' => $this->nro_carnet,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_contratacion' => $this->fecha_contratacion,
            'almacen_id' => $this->almacen_id,
            'area_id' => $this->area_id,
            'updated_by' => auth()->id(),
        ]);

        session()->flash('success', 'Empleado actualizado correctamente.');
        $this->cancelar();
    }

    public function ver($id)
    {
        $empleado = Empleado::findOrFail($id);
        $this->empleado_id = $empleado->id;
        $this->user_id = $empleado->user_id;
        $this->nombre = $empleado->nombre;
        $this->apellido = $empleado->apellido;
        $this->telefono = $empleado->telefono;
        $this->direccion = $empleado->direccion;
        $this->correo = $empleado->correo;
        $this->nro_carnet = $empleado->nro_carnet;
        $this->fecha_nacimiento = $empleado->fecha_nacimiento;
        $this->fecha_contratacion = $empleado->fecha_contratacion;
        $this->almacen_id = $empleado->almacen_id;
        $this->area_id = $empleado->area_id;
        $this->modoLectura = true;
    }

    public function eliminar($id)
    {
        $empleado = Empleado::findOrFail($id);

        if ($empleado->foto && Storage::exists('public/' . $empleado->foto)) {
            Storage::delete('public/' . $empleado->foto);
        }

        $empleado->delete();

        session()->flash('success', 'Empleado eliminado correctamente.');
        $this->cancelar();
    }

    protected $messages = [
        'user_id.required' => 'Debe seleccionar un usuario.',
        'user_id.exists' => 'El usuario seleccionado no es válido.',

        'nombre.required' => 'El nombre es obligatorio.',
        'apellido.required' => 'El apellido es obligatorio.',
        'correo.required' => 'El correo es obligatorio.',
        'correo.email' => 'El formato del correo no es válido.',
        'nro_carnet.required' => 'El número de carnet es obligatorio.',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
        'fecha_contratacion.required' => 'La fecha de contratación es obligatoria.',
        'almacen_id.required' => 'Debe seleccionar un almacén.',
        'almacen_id.exists' => 'El almacén seleccionado no es válido.',
        'area_id.required' => 'Debe seleccionar un área.',
        'area_id.exists' => 'El área seleccionada no es válida.',
        'foto.image' => 'La foto debe ser una imagen.',
        'foto.mimes' => 'La foto debe ser en formato JPG o PNG.',
        'foto.max' => 'La imagen no debe superar los 2MB.',
    ];
}

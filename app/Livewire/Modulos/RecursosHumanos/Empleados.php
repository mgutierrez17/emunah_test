<?php

namespace App\Livewire\Modulos\RecursosHumanos;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Empleado;
use App\Models\User;
use App\Models\Almacen;
use App\Models\Area;

class Empleados extends Component
{
    use WithPagination, WithFileUploads;

    public $empleado_id = null;
    public $user_id, $nombre, $apellido, $telefono, $direccion, $correo, $nro_carnet, $fecha_nacimiento, $fecha_contratacion, $almacen_id, $area_id, $fotoFile, $foto;
    public $modo = 'crear', $mostrarFormulario = false;
    public $buscar = '';
    protected $paginationTheme = 'tailwind';

    protected $rules = [
        'user_id' => 'required|exists:users,id|unique:empleados,user_id',
        'nombre' => 'required',
        'apellido' => 'required',
        'correo' => 'required|email|unique:empleados,correo',
        'nro_carnet' => 'required|unique:empleados,nro_carnet',
        'fecha_nacimiento' => 'required|date',
        'fecha_contratacion' => 'required|date',
        'almacen_id' => 'required|exists:almacenes,id',
        'area_id' => 'required|exists:areas,id',
        'fotoFile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ];

    public function render()
    {
        $empleados = Empleado::with(['user', 'almacen', 'area'])
            ->where(function ($q) {
                $q->where('nombre', 'like', '%' . $this->buscar . '%')
                    ->orWhere('apellido', 'like', '%' . $this->buscar . '%');
            })
            ->orderBy('apellido')->paginate(10);

        $usuarios = User::when($this->user_id, function ($query) {
            $query->orWhere('id', $this->user_id);
        })
            ->whereDoesntHave('empleado')
            ->orWhereHas('empleado', function ($q) {
                $q->where('id', $this->empleado_id);
            })
            ->orderBy('name')
            ->get();

        $almacenes = Almacen::orderBy('nom_almacen')->get();
        $areas = Area::orderBy('nombre')->get();

        return view('livewire.modulos.recursos-humanos.empleados', compact('empleados', 'usuarios', 'almacenes', 'areas'))
            ->layout('layouts.app');
    }

    public function guardarEmpleado()
    {
        $rules = $this->rules;
        if ($this->empleado_id) {
            $rules['user_id'] .= ',' . $this->empleado_id;
            $rules['correo'] .= ',' . $this->empleado_id;
            $rules['nro_carnet'] .= ',' . $this->empleado_id;
        }

        $this->validate($rules);

        $data = [
            'user_id' => $this->user_id,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'correo' => $this->correo,
            'nro_carnet' => $this->nro_carnet,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_contratacion' => $this->fecha_contratacion,
            'almacen_id' => $this->almacen_id,
            'area_id' => $this->area_id,
        ];

        if ($this->fotoFile) {
            $path = $this->fotoFile->store('img/empleados', 'public');
            $data['foto'] = 'storage/' . $path;
        }

        if ($this->empleado_id) {
            Empleado::findOrFail($this->empleado_id)->update($data);
        } else {
            Empleado::create($data);
        }

        $this->resetFormulario();
    }

    public function editarEmpleado($id)
    {
        $empleado = Empleado::findOrFail($id);
        $this->empleado_id = $empleado->id;
        $this->fill($empleado->only([
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
            'foto'
        ]));

        $this->modo = 'editar';
        $this->mostrarFormulario = true;
        $this->resetErrorBag();
    }

    public function verEmpleado($id)
    {
        $this->editarEmpleado($id);
        $this->modo = 'ver';
    }

    public function eliminarEmpleado($id)
    {
        Empleado::findOrFail($id)?->delete();
        $this->resetFormulario();
    }

    public function resetFormulario()
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
            'fotoFile',
            'modo',
            'mostrarFormulario'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
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
        'nro_carnet.unique' => 'El número de carnet ya está registrado.',
        'correo.unique' => 'El correo ya está registrado.',
        'user_id.unique' => 'El usuario ya está asignado a otro empleado.',
    ];

    public function updatedBuscar()
    {
        $this->resetPage();
    }
}

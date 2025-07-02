<?php

namespace App\Livewire\Modulos\SociosNegocio;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proveedor;
use Illuminate\Support\Facades\Auth;

class Proveedores extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $proveedor_id, $nombre, $razon_social, $nit, $direccion, $telefono, $correo;
    public $saldo_pedido = 0, $saldo_entregas = 0, $saldo_deuda = 0;
    public $cliente_id, $modo = 'crear', $formularioVisible = false;
    public $buscar = '';

    public $proveedorSeleccionado;

    public function render()
    {
        $proveedores = Proveedor::where('nombre', 'like', '%' . $this->buscar . '%')
            ->orderBy('nombre', 'asc')
            ->paginate(10);

        return view('livewire.modulos.socios-negocio.proveedores', compact('proveedores'));
    }

    public function mostrarFormulario()
    {
        ///        $this->resetFormulario();
        $this->modo = 'crear';
        $this->formularioVisible = true;
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'razon_social' => 'nullable|string|max:255',
            'nit' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:255',
        ]);

        $data = [
            'nombre' => $this->nombre,
            'razon_social' => $this->razon_social,
            'nit' => $this->nit,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
        ];

        if ($this->modo === 'editar') {
            Proveedor::findOrFail($this->proveedor_id)->update(array_merge($data, ['updated_by' => Auth::id()]));
        } else {
            Proveedor::create(array_merge($data, [
                'saldo_pedido' => 0,
                'saldo_ingresos' => 0,
                'saldo_deuda' => 0,
                'created_by' => Auth::id(),
            ]));
        }

        $this->resetFormulario();
    }

    public function editar($id)
    {
        $this->formularioVisible = true;
        $this->modo = 'editar';
        $proveedor = Proveedor::findOrFail($id);

        $this->proveedor_id = $proveedor->id;
        $this->nombre = $proveedor->nombre;
        $this->razon_social = $proveedor->razon_social;
        $this->nit = $proveedor->nit;
        $this->direccion = $proveedor->direccion;
        $this->telefono = $proveedor->telefono;
        $this->correo = $proveedor->correo;
    }

    public function ver($id)
    {
        $this->editar($id);
        $this->modo = 'ver';
    }

    public function eliminar($id)
    {
        $proveedor = Proveedor::with('compras')->findOrFail($id);

        if ($proveedor->compras->count() > 0) {
            session()->flash('error', '❌ No se puede eliminar el proveedor porque tiene compras asociadas.');
            return;
        }

        $proveedor->delete();
        session()->flash('success', '✅ Proveedor eliminado correctamente.');
        $this->resetFormulario();
    }


    public function resetFormulario()
    {
        $this->reset([
            'proveedor_id',
            'nombre',
            'razon_social',
            'nit',
            'direccion',
            'telefono',
            'correo',
            'saldo_pedido',
            'saldo_entregas',
            'saldo_deuda',
            'modo',
            'formularioVisible',
            'proveedorSeleccionado'
        ]);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function cancelarFormulario()
    {
        $this->resetFormulario();
        $this->formularioVisible = false;
    }
}

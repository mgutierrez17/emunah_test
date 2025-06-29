<?php

namespace App\Livewire\Modulos\SociosNegocio;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class Clientes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $nombre, $razon_social, $nit, $direccion, $telefono, $correo;
    public $saldo_pedido = 0, $saldo_entregas = 0, $saldo_deuda = 0;
    public $cliente_id, $modo = 'crear', $formularioVisible = false;
    public $buscar = '';

    public $clienteSeleccionado;

    public function render()
    {
        $clientes = Cliente::where('nombre', 'like', "%{$this->buscar}%")
            ->orWhere('razon_social', 'like', "%{$this->buscar}%")
            ->orderBy('nombre')
            ->paginate(10);

        return view('livewire.modulos.socios-negocio.clientes', compact('clientes'));
    }

    public function mostrarFormulario()
    {
        $this->formularioVisible = true;
    }

    public function cancelar()
    {
        $this->resetFormulario();
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
            'correo' => 'nullable|email',
        ]);

        $data = [
            'nombre' => $this->nombre,
            'razon_social' => $this->razon_social,
            'nit' => $this->nit,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'saldo_pedido' => $this->saldo_pedido,
            'saldo_entregas' => $this->saldo_entregas,
            'saldo_deuda' => $this->saldo_deuda,
        ];

        if ($this->modo === 'editar') {
            Cliente::findOrFail($this->cliente_id)->update(array_merge($data, [
                'updated_by' => Auth::id()
            ]));
        } else {
            Cliente::create(array_merge($data, [
                'created_by' => Auth::id()
            ]));
        }

        $this->resetFormulario();
    }

    public function ver($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->cargarDatos($cliente);
        $this->modo = 'ver';
        $this->formularioVisible = true;
    }

    public function editar($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->cargarDatos($cliente);
        $this->modo = 'editar';
        $this->formularioVisible = true;
    }

    public function eliminar($id)
    {
        Cliente::findOrFail($id)->delete();
        $this->resetFormulario();
    }

    public function cargarDatos($cliente)
    {
        $this->cliente_id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->razon_social = $cliente->razon_social;
        $this->nit = $cliente->nit;
        $this->direccion = $cliente->direccion;
        $this->telefono = $cliente->telefono;
        $this->correo = $cliente->correo;
        $this->saldo_pedido = $cliente->saldo_pedido;
        $this->saldo_entregas = $cliente->saldo_entregas;
        $this->saldo_deuda = $cliente->saldo_deuda;
    }

    public function resetFormulario()
    {
        $this->reset([
            'cliente_id',
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
            'clienteSeleccionado'
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

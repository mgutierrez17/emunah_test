<?php

namespace App\Livewire\Modulos\Ventas;

use Livewire\Component;
use App\Models\Pedido;
use App\Models\PedidoProducto;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Almacen;
use App\Models\Kardex;
use App\Models\ListaPrecio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Ventas extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $cliente_id, $almacen_id, $descripcion, $fecha_pedido, $fecha_entrega;
    public $estado_pedido = 'pedido', $total_pedido = 0, $comentarios;
    public $productos = [];
    public $modo = 'crear', $mostrarFormulario = false;
    public $pedido_id;
    public $listaVigente;

    public function mount()
    {
        $this->fecha_pedido = now()->format('Y-m-d');
        $this->fecha_entrega = now()->format('Y-m-d');
        $this->productos = [[
            'producto_id' => '',
            'cantidad' => 1,
            'precio_unitario' => 0,
            'precio_total' => 0,
        ]];
        $this->obtenerListaVigente();
    }

    public function render()
    {
        $clientes = Cliente::orderBy('nombre')->get();
        $productosLista = Producto::orderBy('nom_producto')->get();
        $almacenes = Almacen::orderBy('nom_almacen')->get();

        $ventas = Pedido::with('cliente')->latest()->paginate(10);

        return view('livewire.modulos.ventas.ventas', compact('clientes', 'productosLista', 'almacenes', 'ventas'))
            ->layout('layouts.app');
    }


    public function agregarProducto()
    {
        $this->productos[] = [
            'producto_id' => '',
            'cantidad' => 1,
            'precio_unitario' => 0,
            'precio_total' => 0,
        ];
    }

    public function quitarProducto($i)
    {
        unset($this->productos[$i]);
        $this->productos = array_values($this->productos);
        $this->calcularTotales();
    }

    public function updated($property)
    {
        if (str_starts_with($property, 'productos')) {
            $this->calcularTotales();
        }
    }

    public function calcularTotales()
    {
        foreach ($this->productos as $i => $p) {
            $cant = (float) ($p['cantidad'] ?? 0);
            $pu = (float) ($p['precio_unitario'] ?? 0);
            $this->productos[$i]['precio_total'] = round($cant * $pu, 2);
        }

        $this->total_pedido = collect($this->productos)->sum('precio_total');
    }

    public function guardar()
    {
        $reglas = [
            'cliente_id' => 'required',
            'almacen_id' => 'required',
            'descripcion' => 'required|string',
            'fecha_pedido' => 'required|date',
            'fecha_entrega' => 'required|date',
            'productos.*.producto_id' => 'required',
            'productos.*.cantidad' => 'required|numeric|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
        ];

        // Mensajes personalizados
        $mensajes = [];

        foreach ($this->productos as $i => $p) {
            $fila = $i + 1;
            $mensajes["productos.$i.producto_id.required"] = "El producto en la fila $fila es obligatorio.";
            $mensajes["productos.$i.cantidad.required"] = "La cantidad en la fila $fila es obligatoria.";
            $mensajes["productos.$i.cantidad.numeric"] = "La cantidad en la fila $fila debe ser numérica.";
            $mensajes["productos.$i.cantidad.min"] = "La cantidad en la fila $fila debe ser mayor a 0.";
            $mensajes["productos.$i.precio_unitario.required"] = "El precio unitario en la fila $fila es obligatorio.";
            $mensajes["productos.$i.precio_unitario.numeric"] = "El precio unitario en la fila $fila debe ser numérico.";
            $mensajes["productos.$i.precio_unitario.min"] = "El precio unitario en la fila $fila no puede ser negativo.";
        }

        $this->validate($reglas, $mensajes);


        $this->calcularTotales();

        if ($this->modo === 'editar') {
            $pedido = Pedido::findOrFail($this->pedido_id);
            $pedido->update([
                'cliente_id' => $this->cliente_id,
                'almacen_id' => $this->almacen_id,
                'descripcion' => $this->descripcion,
                'fecha_pedido' => $this->fecha_pedido,
                'fecha_entrega' => $this->fecha_entrega,
                'comentarios' => $this->comentarios,
                'total_pedido' => $this->total_pedido,
                'updated_by' => Auth::id(),
            ]);
            $pedido->productos()->delete();
        } else {
            $pedido = Pedido::create([
                'cliente_id' => $this->cliente_id,
                'almacen_id' => $this->almacen_id,
                'descripcion' => $this->descripcion,
                'fecha_pedido' => $this->fecha_pedido,
                'fecha_entrega' => $this->fecha_entrega,
                'estado_pedido' => 'pedido',
                'comentarios' => $this->comentarios,
                'total_pedido' => $this->total_pedido,
                'created_by' => Auth::id(),
            ]);
        }

        foreach ($this->productos as $prod) {
            $pedido->productos()->create($prod);
        }

        session()->flash('success', 'Pedido guardado exitosamente.');
        $this->cancelarFormulario();
    }

    public function editar($id)
    {
        $pedido = Pedido::with('detalles')->findOrFail($id);
        $this->modo = 'editar';
        $this->mostrarFormulario = true;
        $this->pedido_id = $pedido->id;
        $this->cliente_id = $pedido->cliente_id;
        $this->almacen_id = $pedido->almacen_id;
        $this->descripcion = $pedido->descripcion;
        $this->fecha_pedido = $pedido->fecha_pedido;
        $this->fecha_entrega = $pedido->fecha_entrega;
        $this->comentarios = $pedido->comentarios;
        $this->productos = [];

        foreach ($pedido->detalles as $d) {
            $this->productos[] = [
                'producto_id' => $d->producto_id,
                'cantidad' => $d->cantidad,
                'precio_unitario' => $d->precio_unitario,
                'precio_total' => $d->precio_total,
            ];
        }

        $this->total_pedido = $pedido->total_pedido;
    }

    public function ver($id)
    {
        $this->editar($id);
        $this->modo = 'ver';
    }

    public function eliminar($id)
    {
        Pedido::findOrFail($id)->delete();
        session()->flash('success', 'Pedido eliminado.');
    }

    public function verFormulario()
    {
        $this->resetFormulario();
        $this->modo = 'crear';
        $this->mostrarFormulario = true;
    }

    public function cancelarFormulario()
    {
        $this->resetFormulario();
    }

    public function resetFormulario()
    {
        $this->reset([
            'cliente_id',
            'almacen_id',
            'descripcion',
            'fecha_pedido',
            'fecha_entrega',
            'comentarios',
            'productos',
            'modo',
            'mostrarFormulario',
            'pedido_id',
            'total_pedido'
        ]);

        $this->productos = [[
            'producto_id' => '',
            'cantidad' => 1,
            'precio_unitario' => 0,
            'precio_total' => 0,
        ]];

        $this->fecha_pedido = now()->format('Y-m-d');
        $this->fecha_entrega = now()->format('Y-m-d');
    }

    public function actualizarEstado($id, $nuevoEstado)
    {
        $pedido = Pedido::with('detalles')->findOrFail($id);
        $estadoAnterior = $pedido->estado_pedido;

        // 🔁 Reversión de estados especiales
        if ($estadoAnterior === 'entrega' && $nuevoEstado === 'cancelado') {
            $nuevoEstado = 'pedido';
        }

        if ($estadoAnterior === 'facturado' && $nuevoEstado === 'anulado') {
            $nuevoEstado = 'entrega';
        }

        // ✅ De "pedido" a "entrega": registrar en Kardex y descontar stock
        if ($estadoAnterior === 'pedido' && $nuevoEstado === 'entrega') {
            foreach ($pedido->detalles as $detalle) {
                DB::table('almacen_productos')
                    ->where('producto_id', $detalle->producto_id)
                    ->where('almacen_id', $pedido->almacen_id)
                    ->decrement('stock', $detalle->cantidad);

                Kardex::create([
                    'pedido_id'       => $pedido->id,
                    'producto_id'     => $detalle->producto_id,
                    'almacen_id'      => $pedido->almacen_id,
                    'cantidad'        => -1 * $detalle->cantidad,
                    'precio_unitario' => $detalle->precio_unitario,
                    'fecha_entrada'   => now()->toDateString(),
                    'user_id'         => Auth::id(),
                ]);
            }
        }

        // 🔁 Si pasa de entrega a devolución → sumar al stock y registrar en kardex
        if ($estadoAnterior === 'entrega' && $nuevoEstado === 'devolucion') {
            foreach ($pedido->detalles as $detalle) {
                DB::table('almacen_productos')
                    ->where('producto_id', $detalle->producto_id)
                    ->where('almacen_id', $pedido->almacen_id)
                    ->increment('stock', $detalle->cantidad);

                Kardex::create([
                    'pedido_id'       => $pedido->id,
                    'producto_id'     => $detalle->producto_id,
                    'almacen_id'      => $pedido->almacen_id,
                    'cantidad'        => $detalle->cantidad,
                    'precio_unitario' => $detalle->precio_unitario,
                    'fecha_entrada'   => now()->toDateString(),
                    'user_id'         => Auth::id(),
                ]);
            }
        }

        // ✏️ Actualiza el estado del pedido
        $pedido->update([
            'estado_pedido' => $nuevoEstado,
            'updated_by' => Auth::id(),
        ]);

        session()->flash('success', 'Estado actualizado correctamente.');
    }

    public function updatedProductos($value, $key)
    {
        [$index, $campo] = explode('.', str_replace('productos.', '', $key));

        // Si se cambió el producto
        if ($campo === 'producto_id') {
            $productoId = $this->productos[$index]['producto_id'];

            // Verificar si hay stock disponible
            if ($productoId && $this->almacen_id) {
                $stock = \App\Models\AlmacenProducto::where('producto_id', $productoId)
                    ->where('almacen_id', $this->almacen_id)
                    ->value('stock');

                if ($stock === null || $stock <= 0) {
                    session()->flash('error', '❌ El producto seleccionado no tiene stock disponible en este almacén.');
                    $this->productos[$index]['producto_id'] = '';
                    return;
                }
            }


            if (!$this->listaVigente) {
                session()->flash('error', 'No hay una lista de precios vigente.');
                return;
            }

            $precioLista = DB::table('lista_precios_productos')
                ->where('lista_precio_id', $this->listaVigente->id)
                ->where('producto_id', $productoId)
                ->value('precio');

            if ($precioLista !== null) {
                $this->productos[$index]['precio_unitario'] = $precioLista;
            } else {
                session()->flash('error', 'El producto no tiene precio asignado en la lista vigente.');
                $this->productos[$index]['precio_unitario'] = 0;
            }
        }

        // Siempre actualizar el total del producto
        $cantidad = $this->productos[$index]['cantidad'] ?? 0;
        $precio   = $this->productos[$index]['precio_unitario'] ?? 0;

        $this->productos[$index]['precio_total'] = round($cantidad * $precio, 2);

        // Recalcular el total del pedido
        $this->total_pedido = collect($this->productos)->sum('precio_total');
    }


    public function verificarStock($index)
    {
        $productoId = $this->productos[$index]['producto_id'] ?? null;
        $cantidad   = $this->productos[$index]['cantidad'] ?? 0;

        if ($productoId && $this->almacen_id) {
            $stock = \App\Models\AlmacenProducto::where('producto_id', $productoId)
                ->where('almacen_id', $this->almacen_id)
                ->value('stock');

            if (is_null($stock)) {
                session()->flash('error', '⚠️ No hay stock registrado para este producto en el almacén seleccionado.');
            } elseif ($cantidad > $stock) {
                session()->flash('error', '⚠️ La cantidad solicitada supera el stock disponible (' . $stock . ').');
            }
        }
    }

    public function obtenerListaVigente()
    {
        $this->listaVigente = ListaPrecio::where('estado', 1)
            ->whereDate('fecha_inicio', '<=', now())
            ->whereDate('fecha_final', '>=', now())
            ->first();
    }
}

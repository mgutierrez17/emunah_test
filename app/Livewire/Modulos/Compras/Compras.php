<?php

namespace App\Livewire\Modulos\Compras;

use Livewire\Component;
use App\Models\GuiaIngreso;
use App\Models\GuiaIngresoDetalle;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Almacen;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Kardex;
use Illuminate\Support\Facades\DB;


class Compras extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';

    public $proveedor_id, $descripcion, $fecha_compra, $fecha_ingreso, $estado_ingreso = 'pedido', $total_pedido = 0, $comentarios;
    public $productos = [];
    public $modo = 'crear', $mostrarFormulario = false;
    public $guia_id;
    public $almacen_id;


    public function mount()
    {
        $this->fecha_compra = now()->format('Y-m-d');
        $this->fecha_ingreso = now()->format('Y-m-d');
        $this->estado_ingreso = 'pedido';
        $this->productos = [[
            'producto_id' => '',
            'cantidad' => 1,
            'precio_unitario' => 0,
            'precio_total' => 0,
        ]];
    }

    public function render()
    {
        $proveedores = Proveedor::orderBy('nombre')->get();
        $productosLista = Producto::orderBy('nom_producto')->get();
        $guias = GuiaIngreso::with('proveedor')->latest()->paginate(10);
        $almacenes = \App\Models\Almacen::orderBy('nom_almacen')->get();
        return view('livewire.modulos.compras.compras', compact('proveedores', 'productosLista', 'guias', 'almacenes'))
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

    public function quitarProducto($index)
    {
        unset($this->productos[$index]);
        $this->productos = array_values($this->productos);
        $this->calcularTotalPedido();
    }

    public function updatedProductos($value, $key)
    {
        $this->actualizarTotales();
    }

    public function updated($propertyName)
    {
        if (str_starts_with($propertyName, 'productos.')) {
            $this->actualizarTotales();
        }
    }

    public function actualizarTotales()
    {
        foreach ($this->productos as $i => $prod) {
            $cantidad = isset($prod['cantidad']) ? (float) $prod['cantidad'] : 0;
            $precio = isset($prod['precio_unitario']) ? (float) $prod['precio_unitario'] : 0;
            $this->productos[$i]['precio_total'] = round($cantidad * $precio, 2);
        }

        $this->total_pedido = collect($this->productos)->sum('precio_total');
    }


    public function calcularTotalPedido()
    {
        $this->total_pedido = collect($this->productos)->sum('precio_total');
    }

    public function guardar()
    {
        $this->validate([
            'proveedor_id' => 'required|exists:proveedores,id',
            'almacen_id' => 'required|exists:almacenes,id',
            'descripcion' => 'required|string|max:255',
            'fecha_compra' => 'required|date',
            'fecha_ingreso' => 'required|date',
            'productos.*.producto_id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|numeric|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0'
        ]);

        // Calcular total
        $this->total_pedido = collect($this->productos)->sum('precio_total');

        if ($this->modo === 'editar' && $this->guia_id) {
            // Actualizar
            $guia = GuiaIngreso::findOrFail($this->guia_id);
            $guia->update([
                'proveedor_id' => $this->proveedor_id,
                'almacen_id' => $this->almacen_id,
                'descripcion' => $this->descripcion,
                'fecha_compra' => $this->fecha_compra,
                'fecha_ingreso' => $this->fecha_ingreso,
                'comentarios' => $this->comentarios,
                'estado_ingreso' => $this->estado_ingreso,
                'total_pedido' => $this->total_pedido,
                'updated_by' => Auth::id(),
            ]);

            // Borrar detalles antiguos
            $guia->detalles()->delete();

            // Guardar nuevos detalles
            foreach ($this->productos as $prod) {
                $guia->detalles()->create([
                    'producto_id' => $prod['producto_id'],
                    'cantidad' => $prod['cantidad'],
                    'precio_unitario' => $prod['precio_unitario'],
                    'precio_total' => $prod['precio_total'],
                ]);
            }

            session()->flash('success', 'Pedido actualizado correctamente.');
        } else {
            // Crear
            $guia = GuiaIngreso::create([
                'proveedor_id' => $this->proveedor_id,
                'almacen_id' => $this->almacen_id,
                'descripcion' => $this->descripcion,
                'fecha_compra' => $this->fecha_compra,
                'fecha_ingreso' => $this->fecha_ingreso,
                'comentarios' => $this->comentarios,
                'estado_ingreso' => 'pedido',
                'total_pedido' => $this->total_pedido,
                'created_by' => Auth::id(),
            ]);

            foreach ($this->productos as $prod) {
                $guia->detalles()->create([
                    'producto_id' => $prod['producto_id'],
                    'cantidad' => $prod['cantidad'],
                    'precio_unitario' => $prod['precio_unitario'],
                    'precio_total' => $prod['precio_total'],
                ]);
            }

            session()->flash('success', 'Pedido registrado correctamente.');
        }

        $this->resetFormulario();
    }


    public function editar($id)
    {
        $guia = GuiaIngreso::with('detalles')->findOrFail($id);
        $this->guia_id = $guia->id;
        $this->proveedor_id = $guia->proveedor_id;
        $this->almacen_id = $guia->almacen_id;
        $this->descripcion = $guia->descripcion;
        $this->fecha_compra = $guia->fecha_compra;
        $this->fecha_ingreso = $guia->fecha_ingreso;
        $this->comentarios = $guia->comentarios;
        $this->estado_ingreso = $guia->estado_ingreso;
        $this->modo = 'editar';
        $this->mostrarFormulario = true;

        // Cargar productos del detalle
        $this->productos = [];
        foreach ($guia->detalles as $detalle) {
            $this->productos[] = [
                'producto_id' => $detalle->producto_id,
                'cantidad' => $detalle->cantidad,
                'precio_unitario' => $detalle->precio_unitario,
                'precio_total' => $detalle->precio_total,
            ];
        }

        // Calcular total del pedido
        $this->total_pedido = collect($this->productos)->sum('precio_total');
    }


    public function ver($id)
    {
        $this->editar($id);
        $this->modo = 'ver';
    }

    public function eliminar($id)
    {
        GuiaIngreso::findOrFail($id)->delete();
        session()->flash('success', 'Compra eliminada correctamente.');
    }

    public function actualizarEstado($id, $nuevoEstado)
    {
        if (empty($nuevoEstado)) {
            session()->flash('error', 'Seleccione un estado válido.');
            return;
        }

        $guia = GuiaIngreso::with('detalles')->findOrFail($id);
        $estadoAnterior = $guia->estado_ingreso;

        // 🔁 Reversión de estados especiales
        if ($estadoAnterior === 'entrada_mercaderia' && $nuevoEstado === 'cancelado') {
            $nuevoEstado = 'pedido';
        }

        if ($estadoAnterior === 'facturado' && $nuevoEstado === 'anulado') {
            $nuevoEstado = 'entrada_mercaderia';
        }

        // ✅ Si cambia de pedido a entrada: agregar a stock + kardex
        if ($estadoAnterior === 'pedido' && $nuevoEstado === 'entrada_mercaderia') {
            foreach ($guia->detalles as $detalle) {
                $productoId = $detalle->producto_id;
                $almacenId = $guia->almacen_id;

                // Crear registro en Kardex
                Kardex::create([
                    'guia_ingreso_id' => $guia->id,
                    'producto_id'     => $productoId,
                    'almacen_id'      => $almacenId,
                    'cantidad'        => $detalle->cantidad,
                    'precio_unitario' => $detalle->precio_unitario,
                    'fecha_entrada'   => now()->toDateString(),
                    'user_id'         => Auth::id(),
                ]);

                // Actualizar stock
                DB::table('almacen_productos')->updateOrInsert(
                    [
                        'producto_id' => $productoId,
                        'almacen_id' => $almacenId,
                    ],
                    [
                        'stock'      => DB::raw('stock + ' . $detalle->cantidad),
                        'updated_at' => now()
                    ]
                );
            }
        }

        // 🔻 Si cambia de entrada a devolucion: descontar stock + kardex negativo
        if ($estadoAnterior === 'entrada_mercaderia' && $nuevoEstado === 'devolucion') {
            foreach ($guia->detalles as $detalle) {
                $productoId = $detalle->producto_id;
                $cantidad = $detalle->cantidad;
                $precio = $detalle->precio_unitario;
                $almacenId = $guia->almacen_id;

                // Disminuir stock
                DB::table('almacen_productos')
                    ->where('producto_id', $productoId)
                    ->where('almacen_id', $almacenId)
                    ->decrement('stock', $cantidad);

                // Registrar en Kardex con cantidad negativa
                Kardex::create([
                    'guia_ingreso_id' => $guia->id,
                    'producto_id'     => $productoId,
                    'almacen_id'      => $almacenId,
                    'cantidad'        => -1 * $cantidad,
                    'precio_unitario' => $precio,
                    'fecha_entrada'   => now()->toDateString(),
                    'user_id'         => Auth::id(),
                ]);
            }
        }

        // 📝 Actualizar estado final de la guía
        $guia->update([
            'estado_ingreso' => $nuevoEstado,
            'updated_by'     => Auth::id(),
        ]);

        session()->flash('success', 'Estado actualizado correctamente.');
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
            'proveedor_id',
            'almacen_id',
            'descripcion',
            'fecha_compra',
            'fecha_ingreso',
            'comentarios',
            'total_pedido',
            'productos',
            'modo',
            'mostrarFormulario'
        ]);
        $this->productos = [[
            'producto_id' => '',
            'cantidad' => 1,
            'precio_unitario' => 0,
            'precio_total' => 0,
        ]];
        $this->fecha_compra = now()->format('Y-m-d');
        $this->fecha_ingreso = now()->format('Y-m-d');
        $this->resetErrorBag();
        $this->resetValidation();
    }
}

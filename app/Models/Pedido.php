<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PedidoProducto;


class Pedido extends Model
{
    protected $fillable = [
        'cliente_id',
        'almacen_id',
        'descripcion',
        'fecha_pedido',
        'fecha_entrega',
        'estado_pedido',
        'total_pedido',
        'comentarios',
        'fecha_pago',
        'comprobante_pago',
        'created_by',
        'updated_by',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function productos()
    {
        return $this->hasMany(PedidoProducto::class);
    }

    public function pagos()
    {
        return $this->hasMany(PagoPedido::class);
    }

    public function detalles()
    {
        return $this->hasMany(PedidoProducto::class);
    }
}

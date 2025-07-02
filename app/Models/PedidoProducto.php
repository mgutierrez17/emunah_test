<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProducto extends Model
{
    protected $fillable = [
        'pedido_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'precio_total',
    ];

    // Relación con producto (opcional)
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    // Relación con pedido (opcional)
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

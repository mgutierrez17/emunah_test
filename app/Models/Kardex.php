<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    protected $table = 'kardex';

    protected $fillable = [
        'guia_ingreso_id',
        'pedido_id',
        'producto_id',
        'almacen_id',
        'cantidad',
        'precio_unitario',
        'fecha_entrada',
        'user_id'
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guiaIngreso()
    {
        return $this->belongsTo(GuiaIngreso::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuiaIngresoDetalle extends Model
{
    protected $fillable = [
        'guia_ingreso_id',
        'producto_id',
        'precio_unitario',
        'cantidad',
        'precio_total',
    ];

    public function guia()
    {
        return $this->belongsTo(GuiaIngreso::class, 'guia_ingreso_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

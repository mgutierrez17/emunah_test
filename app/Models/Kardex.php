<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    protected $table = 'kardex'; 

    protected $fillable = [
        'guia_ingreso_id',
        'producto_id',
        'almacen_id',
        'cantidad',
        'precio_unitario',
        'fecha_entrada',
        'user_id'
    ];
}

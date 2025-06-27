<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaPrecioProducto extends Model
{
    protected $table = 'lista_precios_productos'; // cambia el nombre de la tabla

    protected $fillable = [
        'lista_precio_id',
        'producto_id',
        'precio',
        'created_by',
        'updated_by',
    ];
    public $timestamps = true;

    // app/Models/ListaPrecioProducto.php
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

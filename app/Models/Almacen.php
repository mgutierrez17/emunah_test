<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacenes'; //  Indica el nombre real
    protected $fillable = ['nom_almacen', 'direccion_almacen'];

    public function almacenProductos()
    {
        return $this->hasMany(AlmacenProducto::class);
    }
}

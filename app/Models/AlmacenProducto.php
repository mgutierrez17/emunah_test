<?php

// app/Models/AlmacenProducto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlmacenProducto extends Model
{
    use HasFactory;

    protected $fillable = ['almacen_id', 'producto_id', 'stock', 'cantidad_optima', 'cantidad_minima', 'ubicacion', 'created_by', 'updated_by'];

    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class);
    }

    public function almacen()
    {
        return $this->belongsTo(\App\Models\Almacen::class);
    }
}

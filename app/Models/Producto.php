<?php

// app/Models/Producto.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'nom_producto',
        'codigo_venta',
        'created_by',
        'updated_by'
    ];

    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    public function almacenProductos()
    {
        return $this->hasMany(\App\Models\AlmacenProducto::class);
    }
}

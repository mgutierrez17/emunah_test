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

    public function kardex()
    {
        return $this->hasMany(Kardex::class);
    }

    // Producto.php
    public function precios()
    {
        return $this->hasMany(ListaPrecioProducto::class);
    }

    public function stockEnAlmacen($almacen_id)
    {
        return $this->hasOne(AlmacenProducto::class)->where('almacen_id', $almacen_id);
    }

    public function pedidos()
    {
        return $this->hasMany(\App\Models\PedidoProducto::class, 'producto_id');
    }

    public function compras()
    {
        return $this->hasMany(\App\Models\GuiaIngresoDetalle::class, 'producto_id');
    }
}

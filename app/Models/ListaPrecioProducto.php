<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaPrecioProducto extends Model
{
    use HasFactory;

    protected $table = 'lista_precios_productos';

    protected $fillable = [
        'lista_precio_id',
        'producto_id',
        'precio',
        'created_by',
        'updated_by',
    ];

    public function lista()
    {
        return $this->belongsTo(ListaPrecio::class, 'lista_precio_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function actualizador()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

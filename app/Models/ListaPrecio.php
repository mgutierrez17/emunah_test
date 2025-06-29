<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListaPrecio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_lista', 'estado', 'fecha_inicio', 'fecha_final',
        'created_by', 'updated_by',
    ];

    public function productos()
    {
        return $this->hasMany(ListaPrecioProducto::class);
    }
}

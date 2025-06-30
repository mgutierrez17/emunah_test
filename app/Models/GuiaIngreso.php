<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuiaIngreso extends Model
{
    use HasFactory;

    protected $fillable = [
        'almacen_id',
        'proveedor_id',
        'descripcion',
        'fecha_compra',
        'fecha_ingreso',
        'estado_ingreso',
        'total_pedido',
        'comentarios',
        'fecha_pago',
        'comprobante_pago',
        'created_by',
        'updated_by'
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detalles()
    {
        return $this->hasMany(GuiaIngresoDetalle::class);
    }

    public function pagos()
    {
        return $this->hasMany(PagoCompra::class);
    }

    public function kardex()
    {
        return $this->hasMany(Kardex::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagoCompra extends Model
{
    protected $fillable = [
        'guia_ingreso_id',
        'fecha_pago',
        'nro_comprobante',
        'banco',
        'monto_pagado',
        'created_by',
        'updated_by',
    ];

    public function guia()
    {
        return $this->belongsTo(GuiaIngreso::class, 'guia_ingreso_id');
    }
}

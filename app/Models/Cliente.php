<?php

// app/Models/Cliente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombre',
        'razon_social',
        'nit',
        'direccion',
        'telefono',
        'correo',
        'saldo_pedido',
        'saldo_entregas',
        'saldo_deuda',
        'created_by',
        'updated_by'
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class);
    }
}

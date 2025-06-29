<?php

// app/Models/Proveedor.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores'; // <- Corrección aquí

    protected $fillable = [
        'nombre',
        'razon_social',
        'nit',
        'direccion',
        'telefono',
        'correo',
        'saldo_pedido',
        'saldo_ingresos',
        'saldo_deuda',
        'created_by',
        'updated_by'
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function actualizador()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

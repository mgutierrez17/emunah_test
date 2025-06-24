<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


// app/Models/Empleado.php
class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
        'correo',
        'nro_carnet',
        'fecha_nacimiento',
        'fecha_contratacion',
        'almacen_id',
        'area_id',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}

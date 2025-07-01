<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $fillable = ['nombre', 'icono', 'ruta', 'estado'];

    public function roles()
    {
        return $this->belongsToMany(\Spatie\Permission\Models\Role::class, 'pagina_role');
    }
}

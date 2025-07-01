<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class RoleCustom extends SpatieRole
{
    public function paginas()
    {
        return $this->belongsToMany(Pagina::class, 'pagina_role');
    }
}

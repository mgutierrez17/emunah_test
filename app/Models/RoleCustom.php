<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class RoleCustom extends SpatieRole
{


    public function paginas()
{
    return $this->belongsToMany(\App\Models\Pagina::class, 'pagina_role', 'role_id', 'pagina_id');
}

}

<?php

use Illuminate\Database\Seeder;
use App\Models\Pagina;
use Spatie\Permission\Models\Role;

class PaginaRoleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Role::where('name', 'admin')->first();
        $ventas = Role::where('name', 'ventas')->first();
        $compras = Role::where('name', 'compras')->first();
        $almacenes = Role::where('name', 'almacenes')->first();

        $admin->paginas()->sync(Pagina::pluck('id')->toArray());

        $almacenes->paginas()->sync([
            Pagina::where('ruta', '/almacenes')->value('id'),
            Pagina::where('ruta', '/categorias')->value('id'),
            Pagina::where('ruta', '/lista-precios')->value('id'),
            Pagina::where('ruta', '/lista-precios-productos/1')->value('id'),
        ]);

        $ventas->paginas()->sync([
            Pagina::where('ruta', '/clientes')->value('id'),
            Pagina::where('ruta', '/productos')->value('id'),
            Pagina::where('ruta', '/ventas')->value('id'),
            Pagina::where('ruta', '/almacenes')->value('id'),
            Pagina::where('ruta', '/categorias')->value('id'),
            Pagina::where('ruta', '/lista-precios')->value('id'),
            Pagina::where('ruta', '/lista-precios-productos/1')->value('id'),
        ]);

        $compras->paginas()->sync([
            Pagina::where('ruta', '/proveedores')->value('id'),
            Pagina::where('ruta', '/compras')->value('id'),
            Pagina::where('ruta', '/almacenes')->value('id'),
            Pagina::where('ruta', '/categorias')->value('id'),
            Pagina::where('ruta', '/lista-precios')->value('id'),
            Pagina::where('ruta', '/lista-precios-productos/1')->value('id'),
        ]);
    }
}

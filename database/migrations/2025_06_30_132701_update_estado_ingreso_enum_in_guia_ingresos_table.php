<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE guia_ingresos MODIFY estado_ingreso ENUM('pedido', 'entrada_mercaderia', 'facturado', 'devolucion', 'cancelado', 'pagado', 'anulado') DEFAULT 'pedido'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE guia_ingresos MODIFY estado_ingreso ENUM('pedido', 'entrada_mercaderia', 'facturado') DEFAULT 'pedido'");
    }
};

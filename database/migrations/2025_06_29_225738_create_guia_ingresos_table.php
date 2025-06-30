<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('guia_ingresos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proveedor_id')->constrained('proveedores')->onDelete('cascade');
            $table->string('descripcion');
            $table->date('fecha_compra');
            $table->date('fecha_ingreso');
            $table->enum('estado_ingreso', ['pedido', 'entrada_mercaderia', 'facturado'])->default('pedido');
            $table->decimal('total_pedido', 10, 2)->default(0);
            $table->text('comentarios')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('comprobante_pago')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guia_ingresos');
    }
};

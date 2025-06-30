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
        Schema::create('pagos_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guia_ingreso_id')->constrained()->onDelete('cascade');
            $table->date('fecha_pago');
            $table->string('nro_comprobante');
            $table->string('banco');
            $table->decimal('monto_pagado', 10, 2);
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
        Schema::dropIfExists('pagos_compras');
    }
};

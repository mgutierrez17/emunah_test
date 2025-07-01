<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->foreignId('almacen_id')->constrained('almacenes')->onDelete('cascade');
            $table->string('descripcion');
            $table->date('fecha_pedido');
            $table->date('fecha_entrega');
            $table->enum('estado_pedido', ['pedido', 'entrega', 'facturado', 'devolucion', 'cancelado', 'pagado', 'anulado'])->default('pedido');
            $table->decimal('total_pedido', 10, 2);
            $table->text('comentarios')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->string('comprobante_pago')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};

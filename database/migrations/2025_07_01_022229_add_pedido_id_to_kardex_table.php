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
        Schema::table('kardex', function (Blueprint $table) {
            $table->unsignedBigInteger('pedido_id')->nullable()->after('guia_ingreso_id');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('kardex', function (Blueprint $table) {
            $table->dropForeign(['pedido_id']);
            $table->dropColumn('pedido_id');
        });
    }
};

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
            $table->increments('Id_Pedido');
            // Misma definición que clientes.Id_Cliente (increments = unsigned integer)
            $table->unsignedInteger('Id_Cliente');
            $table->string('Descripcion', 100);
            $table->date('Fecha_Pedido');
            $table->decimal('Total', 8, 2);
            $table->timestamps();

            $table->foreign('Id_Cliente')
                ->references('Id_Cliente')
                ->on('clientes')
                ->onDelete('cascade');
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

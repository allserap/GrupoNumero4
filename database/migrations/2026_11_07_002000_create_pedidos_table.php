<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('Id_Pedido');
            $table->dateTime('FechaPedido');
            $table->dateTime('FechaEntrega');
            $table->string('Observaciones', 150)->nullable();
            $table->unsignedInteger('Id_Cliente');
            $table->timestamps();

            // FK_Pedido_Cliente
            $table->foreign('Id_Cliente', 'FK_Pedido_Cliente')
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

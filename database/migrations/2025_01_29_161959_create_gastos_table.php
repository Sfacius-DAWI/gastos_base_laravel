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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('titulo'); // Título del gasto
            $table->text('descripcion')->nullable(); // Descripción (opcional)
            $table->decimal('total', 10, 2); // Total con 2 decimales
            $table->timestamp('fecha_registro')->default(now()); // Fecha de registro con valor por defecto
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};

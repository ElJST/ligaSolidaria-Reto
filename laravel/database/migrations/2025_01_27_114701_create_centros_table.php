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
        Schema::create('centros', function (Blueprint $table) {
            $table->bigIncrements('id_centro'); // Define la columna 'id_centro' como clave primaria
            $table->unsignedBigInteger('fk_sede'); // Asegúrate de declarar la columna fk_sede primero
            $table->foreign('fk_sede')->references('id_sede')->on('sedes')->onDelete('cascade'); // Luego la clave foránea
            $table->string('nombre');
            $table->string('direccion');
            $table->text('anotaciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centros');
    }
};

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
        Schema::create('retos', function (Blueprint $table) {
            $table->bigIncrements('id_reto'); // Define 'id_reto' como clave primaria
            $table->unsignedBigInteger('fk_centro'); // Define la columna 'fk_centro' de tipo 'unsignedBigInteger'
            $table->foreign('fk_centro')->references('id_centro')->on('centros')->onDelete('cascade'); // Relación con 'centros'
            $table->unsignedBigInteger('fk_torneo'); // Define la columna 'fk_torneo' de tipo 'unsignedBigInteger'
            $table->foreign('fk_torneo')->references('id_torneo')->on('torneos')->onDelete('cascade'); // Relación con 'torneos'
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('estudios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retos');
    }
};

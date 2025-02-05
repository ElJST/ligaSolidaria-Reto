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
        Schema::create('torneos', function (Blueprint $table) {
            $table->bigIncrements('id_torneo'); // Define 'id_torneo' como clave primaria
            $table->string('nombre');
            $table->integer('fk_logo');
            $table->unsignedBigInteger('fk_localizacion'); // Asegúrate de que esta columna se declare
            $table->foreign('fk_localizacion')->references('id_localizacion')->on('localizaciones')->onDelete('cascade'); // Relación con 'localizaciones'
            $table->date('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};

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
        Schema::create('localizaciones', function (Blueprint $table) {
            $table->bigIncrements('id_localizacion'); // Define la columna 'id_localizacion' como clave primaria
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
        Schema::dropIfExists('localizaciones');
    }
};

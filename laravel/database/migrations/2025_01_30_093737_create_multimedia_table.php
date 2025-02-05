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
    Schema::create('multimedia', function (Blueprint $table) {
        $table->id();  // ID autoincremental
        $table->unsignedBigInteger('fk_reto');  // Relación con la tabla retos
        $table->string('ruta');  // Almacena la ruta de la imagen
        $table->string('tipo')->nullable(); // Tipo MIME de la imagen
        $table->timestamps();

        // Clave foránea
        $table->foreign('fk_reto')->references('id_reto')->on('retos')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multimedia');
    }
};

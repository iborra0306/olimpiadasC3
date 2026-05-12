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
        Schema::create('resultados_olimpiadas_cache', function (Blueprint $table) {
            $table->id();
            $table->string('grado', 2)->nullable();
            $table->string('lastname', 100)->default('');
            $table->string('firstname', 100)->default('');
            $table->foreignId('id_prueba')->constrained('pruebas')->onDelete('cascade');
            $table->decimal('maxpuntuacion', 10, 5)->nullable();
            $table->dateTime('MomentoConsecución')->nullable();
            $table->unsignedBigInteger('penalizaciones')->default(0);
            $table->dateTime('TiempoFinal')->nullable();
            $table->string('nombrePrueba', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados_olimpiadas_cache');
    }
};

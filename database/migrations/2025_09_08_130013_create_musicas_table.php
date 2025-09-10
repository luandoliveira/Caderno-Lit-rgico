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
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('compositor')->nullable();
            $table->foreignId('tempo_liturgico_id')->constrained('tempos_liturgicos');
            $table->foreignId('parte_missa_id')->constrained('partes_missa');
            $table->foreignId('tipo_canto_id')->constrained('tipos_canto');
            $table->string('arquivo'); // caminho do arquivo (storage)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas');
    }
};

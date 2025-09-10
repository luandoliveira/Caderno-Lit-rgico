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
        Schema::create('caderno_musicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('caderno_id')->constrained('cadernos')->onDelete('cascade');
            $table->foreignId('musica_id')->constrained('musicas')->onDelete('cascade');
            $table->integer('ordem')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caderno_musicas');
    }
};

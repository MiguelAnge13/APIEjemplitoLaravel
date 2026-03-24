<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('usuarios')->cascadeOnDelete();
            $table->foreignId('grupo_id')->constrained('grupos')->cascadeOnDelete();
            $table->string('ciclo_escolar');
            $table->timestamps();

            $table->unique(['estudiante_id', 'grupo_id', 'ciclo_escolar']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
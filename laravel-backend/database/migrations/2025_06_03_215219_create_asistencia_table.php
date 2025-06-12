<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('usuarios');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->date('fecha');
            $table->boolean('presente');
            // $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('asistencia'); }
};
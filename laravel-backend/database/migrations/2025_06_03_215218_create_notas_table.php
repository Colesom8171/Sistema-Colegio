<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('usuarios');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->decimal('nota', 5, 2);
            $table->date('fecha');
            // $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('notas'); }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->foreignId('profesor_id')->constrained('usuarios'); // Clave foránea referenciando la tabla 'usuarios'
            // $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('cursos'); }
};
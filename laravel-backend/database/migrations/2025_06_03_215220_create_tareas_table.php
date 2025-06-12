<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('cursos');
            $table->text('descripcion');
            $table->date('fecha_entrega');
            // $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('tareas'); }
};
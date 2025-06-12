<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tareas_entregadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarea_id')->constrained('tareas');
            $table->foreignId('estudiante_id')->constrained('usuarios');
            $table->string('archivo_url', 255);
            $table->date('fecha_entrega');
            // $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('tareas_entregadas'); }
};
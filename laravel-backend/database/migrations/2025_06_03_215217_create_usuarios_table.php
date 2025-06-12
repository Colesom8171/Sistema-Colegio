<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('email', 100)->unique();
            $table->string('contraseña'); // Aquí se guardará la contraseña hasheada
            $table->foreignId('rol_id')->constrained('roles'); // Clave foránea referenciando la tabla 'roles'
            // $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('usuarios'); }
};
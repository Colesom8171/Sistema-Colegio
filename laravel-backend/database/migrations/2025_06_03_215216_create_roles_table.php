<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            // $table->timestamps(); // Puedes descomentar si quieres los campos created_at y updated_at
        });
    }
    public function down(): void { Schema::dropIfExists('roles'); }
};
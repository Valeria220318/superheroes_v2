<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('superheroes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_real');
            $table->string('alias');
            $table->string('foto')->nullable(); 
            $table->text('informacion')->nullable();
            $table->boolean('activo')->default(true); // Campo para controlar el estado (activo/inactivo)
            $table->softDeletes(); // Agrega el campo deleted_at para el borrado lógico
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('superheroes');
    }
};



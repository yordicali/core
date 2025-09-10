<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creador_id')->constrained('users');
            $table->string('nombre');
            $table->string('logo')->nullable(); // path en storage
            $table->text('descripcion_larga')->nullable();
            $table->string('descripcion_corta')->nullable();
            $table->string('icono')->nullable(); // clase de ícono o nombre
            $table->string('color_base', 32)->nullable(); // hex/rgb nombre
            $table->enum('estado', ['disponible', 'inactiva'])->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

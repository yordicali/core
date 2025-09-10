<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });

        Schema::create('funcion_has_permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('funcion_id');
            $table->unsignedBigInteger('permission_id');
            $table->foreign('funcion_id')->references('id')->on('funciones')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->primary(['funcion_id', 'permission_id'], 'funcion_permission_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcion_has_permissions');
        Schema::dropIfExists('funciones');
    }
};


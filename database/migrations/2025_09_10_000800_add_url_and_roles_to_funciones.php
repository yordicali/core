<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('funciones', function (Blueprint $table) {
            $table->string('url')->nullable()->after('nombre');
        });

        Schema::create('funcion_has_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('funcion_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('funcion_id')->references('id')->on('funciones')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->primary(['funcion_id', 'role_id'], 'funcion_role_primary');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('funcion_has_roles');
        Schema::table('funciones', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
};


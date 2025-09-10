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
        Schema::table('applications', function (Blueprint $table) {
            // Añadir columna creador_id como nullable para no romper datos existentes
            if (!Schema::hasColumn('applications', 'creador_id')) {
                $table->foreignId('creador_id')->nullable()->constrained('users')->after('id');
            }

            // Añadir columna estado si no existe
            if (!Schema::hasColumn('applications', 'estado')) {
                $table->enum('estado', ['disponible', 'inactiva'])->default('disponible')->after('color_base');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (Schema::hasColumn('applications', 'creador_id')) {
                // Intentar eliminar la FK y la columna
                $table->dropForeign(['creador_id']);
                $table->dropColumn('creador_id');
            }

            if (Schema::hasColumn('applications', 'estado')) {
                $table->dropColumn('estado');
            }
        });
    }
};

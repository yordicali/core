<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('funciones', function (Blueprint $table) {
            $table->string('icono')->nullable()->after('url');
        });
    }

    public function down(): void
    {
        Schema::table('funciones', function (Blueprint $table) {
            $table->dropColumn('icono');
        });
    }
};


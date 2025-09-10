<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('application_funcion', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id');
            $table->unsignedBigInteger('funcion_id');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->foreign('funcion_id')->references('id')->on('funciones')->onDelete('cascade');
            $table->primary(['application_id','funcion_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_funcion');
    }
};


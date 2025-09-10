<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Rebuild table to allow nullable application_id without composite PK
        Schema::create('role_visible_apps_tmp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
            $table->index('role_id');
            $table->index('application_id');
        });

        // Copy data
        $rows = DB::table('role_visible_apps')->get();
        foreach ($rows as $row) {
            DB::table('role_visible_apps_tmp')->insert([
                'role_id' => $row->role_id,
                'application_id' => $row->application_id,
            ]);
        }

        Schema::drop('role_visible_apps');
        Schema::rename('role_visible_apps_tmp', 'role_visible_apps');
    }

    public function down(): void
    {
        // Down: best effort (drop and recreate original structure)
        Schema::dropIfExists('role_visible_apps');
        Schema::create('role_visible_apps', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('application_id')->nullable();
            $table->primary(['role_id','application_id']);
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
        });
    }
};

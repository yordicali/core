<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

return new class extends Migration {
    public function up(): void
    {
        // Solo en primera instalación: si no hay usuarios ni roles, semillar admin básico
        $now = now();

        // Crear rol "Administrador" si no existe
        $roleId = DB::table('roles')->where('name', 'Administrador')->where('guard_name', 'web')->value('id');
        if (!$roleId) {
            $roleId = DB::table('roles')->insertGetId([
                'name' => 'Administrador',
                'guard_name' => 'web',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Crear usuario admin si no existe
        $userId = DB::table('users')->where('email', 'admin900@tvo.com.co')->value('id');
        if (!$userId) {
            // Hash provisto por el usuario; si desea cambiarlo, puede usar Hash::make('...')
            $hash = '$2y$10$Y1ZWtCBAwwefw0XB.Bg0FuBtIS5JSzanLUK96FSjsZDseeavGGcau';
            $userId = DB::table('users')->insertGetId([
                'name' => 'admin',
                'email' => 'admin900@tvo.com.co',
                'password' => $hash,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Asignar rol a usuario (Spatie pivot)
        $existsPivot = DB::table('model_has_roles')
            ->where('role_id', $roleId)
            ->where('model_type', 'App\\Models\\User')
            ->where('model_id', $userId)
            ->exists();
        if (!$existsPivot) {
            DB::table('model_has_roles')->insert([
                'role_id' => $roleId,
                'model_type' => 'App\\Models\\User',
                'model_id' => $userId,
            ]);
        }

        // Dar visibilidad a CoreTvo (application_id NULL) para el rol Administrador
        $existsCore = DB::table('role_visible_apps')
            ->where('role_id', $roleId)
            ->whereNull('application_id')
            ->exists();
        if (!$existsCore) {
            DB::table('role_visible_apps')->insert([
                'role_id' => $roleId,
                'application_id' => null,
            ]);
        }
    }

    public function down(): void
    {
        // Revertir solo los registros que creamos
        $roleId = DB::table('roles')->where('name', 'Administrador')->where('guard_name', 'web')->value('id');
        $userId = DB::table('users')->where('email', 'admin900@tvo.com.co')->value('id');

        if ($roleId && $userId) {
            DB::table('model_has_roles')
                ->where('role_id', $roleId)
                ->where('model_type', 'App\\Models\\User')
                ->where('model_id', $userId)
                ->delete();
        }

        if ($roleId) {
            DB::table('role_visible_apps')->where('role_id', $roleId)->whereNull('application_id')->delete();
        }

        // No borramos el usuario / rol si ya existían antes; sólo si coinciden exactamente
        if ($userId) {
            DB::table('users')->where('id', $userId)->delete();
        }
        if ($roleId) {
            DB::table('roles')->where('id', $roleId)->delete();
        }
    }
};


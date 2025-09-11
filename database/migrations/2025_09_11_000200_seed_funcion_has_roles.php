<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Asigna las funciones 1..7 al rol 1 (Administrador) si no existen
        $pairs = [1,2,3,4,5,6,7];
        foreach ($pairs as $funcionId) {
            $exists = DB::table('funcion_has_roles')
                ->where('funcion_id', $funcionId)
                ->where('role_id', 1)
                ->exists();
            if (!$exists) {
                DB::table('funcion_has_roles')->insert([
                    'funcion_id' => $funcionId,
                    'role_id' => 1,
                ]);
            }
        }
    }

    public function down(): void
    {
        DB::table('funcion_has_roles')
            ->where('role_id', 1)
            ->whereIn('funcion_id', [1,2,3,4,5,6,7])
            ->delete();
    }
};


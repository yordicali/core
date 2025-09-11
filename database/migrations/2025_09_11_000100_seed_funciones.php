<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $now = now();
        $data = [
            [
                'id' => 1,
                'nombre' => 'Ges. Archivos',
                'url' => '/archivos',
                'icono' => 'bx bx-folder',
                'descripcion' => 'Funcion para gestioanr los archivos',
                'created_at' => '2025-09-11 00:41:12',
                'updated_at' => '2025-09-11 00:41:12',
            ],
            [
                'id' => 2,
                'nombre' => 'Ges. Apps',
                'url' => '/apps',
                'icono' => 'bx bx-grid-alt',
                'descripcion' => 'Funcion para gestionar apps',
                'created_at' => '2025-09-11 00:45:39',
                'updated_at' => '2025-09-11 00:45:39',
            ],
            [
                'id' => 3,
                'nombre' => 'Ges. Roles',
                'url' => '/roles',
                'icono' => 'bx bx-id-card',
                'descripcion' => null,
                'created_at' => '2025-09-11 01:14:33',
                'updated_at' => '2025-09-11 01:16:04',
            ],
            [
                'id' => 4,
                'nombre' => 'Ges. Funciones',
                'url' => '/funciones',
                'icono' => 'bx bx-cog',
                'descripcion' => null,
                'created_at' => '2025-09-11 01:16:30',
                'updated_at' => '2025-09-11 01:16:30',
            ],
            [
                'id' => 5,
                'nombre' => 'Ges. Usuarios',
                'url' => '/users',
                'icono' => 'bx bx-group',
                'descripcion' => null,
                'created_at' => '2025-09-11 01:50:22',
                'updated_at' => '2025-09-11 01:50:22',
            ],
            [
                'id' => 6,
                'nombre' => 'Permisos de rol',
                'url' => '/role-permissions',
                'icono' => 'bx bx-key',
                'descripcion' => null,
                'created_at' => '2025-09-11 02:05:37',
                'updated_at' => '2025-09-11 02:05:37',
            ],
            [
                'id' => 7,
                'nombre' => 'Apps roles',
                'url' => '/role-apps',
                'icono' => 'bx bx-category',
                'descripcion' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($data as $row) {
            // Si existe por nombre, no duplicar
            $existsByNombre = DB::table('funciones')->where('nombre', $row['nombre'])->exists();
            if ($existsByNombre) continue;

            // Si la tabla está vacía podemos respetar los IDs; si no, ignorar el id para evitar colisiones
            $tableEmpty = DB::table('funciones')->count() === 0;
            $insert = $row;
            if (!$tableEmpty) {
                unset($insert['id']);
            }
            DB::table('funciones')->insert($insert);
        }
    }

    public function down(): void
    {
        $nombres = [
            'Ges. Archivos', 'Ges. Apps', 'Ges. Roles', 'Ges. Funciones', 'Ges. Usuarios', 'Permisos de rol', 'Apps roles'
        ];
        DB::table('funciones')->whereIn('nombre', $nombres)->delete();
    }
};


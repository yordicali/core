<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Funcion extends Model
{
    use HasFactory;

    protected $table = 'funciones';
    protected $fillable = ['nombre', 'descripcion', 'url', 'icono'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'funcion_has_permissions', 'funcion_id', 'permission_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'funcion_has_roles', 'funcion_id', 'role_id');
    }

    public function applications()
    {
        return $this->belongsToMany(\App\Models\Application::class, 'application_funcion', 'funcion_id', 'application_id');
    }
}

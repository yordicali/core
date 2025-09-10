<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use App\Models\Application;

class RoleAppVisibility extends Model
{
    public $timestamps = false;
    protected $table = 'role_visible_apps';
    protected $fillable = ['role_id','application_id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function app()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}


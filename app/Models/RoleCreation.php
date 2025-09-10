<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleCreation extends Model
{
    public $timestamps = false;
    protected $table = 'role_creatable_roles';
    protected $fillable = ['role_id','target_role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function targetRole()
    {
        return $this->belongsTo(Role::class, 'target_role_id');
    }
}


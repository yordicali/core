<?php

namespace App\Http\Controllers;

use App\Models\RoleCreation;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleCreationController extends Controller
{
    public function index()
    {
        $mappings = RoleCreation::with(['role','targetRole'])->orderBy('role_id')->get();
        $roles = Role::orderBy('name')->get();
        return view('role-permissions.index', compact('mappings','roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'role_id' => ['required','integer','exists:roles,id'],
            'target_role_id' => ['required','integer','exists:roles,id'],
        ]);
        RoleCreation::firstOrCreate($data);
        return back()->with('status', 'Permiso de creación asignado');
    }

    public function destroy($role_id, $target_role_id)
    {
        RoleCreation::where('role_id', $role_id)
            ->where('target_role_id', $target_role_id)
            ->delete();
        return back()->with('status', 'Permiso de creación eliminado');
    }
}

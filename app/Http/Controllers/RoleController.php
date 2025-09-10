<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
// Simplificado: sin asignación de permisos

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255','unique:roles,name'],
        ]);
        $role = Role::create(['name' => $data['name'], 'guard_name' => 'web']);
        return redirect()->route('roles.index')->with('status', 'Rol creado');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255','unique:roles,name,'.$role->id],
        ]);
        $role->name = $data['name'];
        $role->save();
        return redirect()->route('roles.index')->with('status', 'Rol actualizado');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('status', 'Rol eliminado');
    }
}

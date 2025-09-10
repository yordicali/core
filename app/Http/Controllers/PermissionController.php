<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name')->paginate(15);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255','unique:permissions,name'],
        ]);
        Permission::create(['name' => $data['name'], 'guard_name' => 'web']);
        return redirect()->route('permissions.index')->with('status', 'Permiso creado');
    }

    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255','unique:permissions,name,'.$permission->id],
        ]);
        $permission->name = $data['name'];
        $permission->save();
        return redirect()->route('permissions.index')->with('status', 'Permiso actualizado');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('status', 'Permiso eliminado');
    }
}


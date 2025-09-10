<?php

namespace App\Http\Controllers;

use App\Models\Funcion;
use Illuminate\Http\Request;
// Eliminado uso de permisos, validamos por funciones/roles

class FuncionController extends Controller
{
    public function index()
    {
        $funciones = Funcion::withCount(['roles'])->paginate(10);
        return view('funciones.index', compact('funciones'));
    }

    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::orderBy('name')->get();
        return view('funciones.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:255','unique:funciones,nombre'],
            'descripcion' => ['nullable','string'],
            'url' => ['nullable','string','max:255'],
            'roles' => ['array'],
            'roles.*' => ['integer','exists:roles,id'],
            'icono' => ['nullable','string','max:255'],
        ]);
        $f = Funcion::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'] ?? null,
            'url' => $data['url'] ?? null,
            'icono' => $data['icono'] ?? null,
        ]);
        $f->roles()->sync($data['roles'] ?? []);
        cache()->forget('funciones_with_roles');
        return redirect()->route('funciones.index')->with('status', 'Función creada');
    }

    public function edit(Funcion $funcion)
    {
        $roles = \Spatie\Permission\Models\Role::orderBy('name')->get();
        $assignedRoles = $funcion->roles()->pluck('id')->all();
        return view('funciones.edit', compact('funcion','roles','assignedRoles'));
    }

    public function update(Request $request, Funcion $funcion)
    {
        $data = $request->validate([
            'nombre' => ['required','string','max:255','unique:funciones,nombre,'.$funcion->id],
            'descripcion' => ['nullable','string'],
            'url' => ['nullable','string','max:255'],
            'roles' => ['array'],
            'roles.*' => ['integer','exists:roles,id'],
            'icono' => ['nullable','string','max:255'],
        ]);
        $funcion->nombre = $data['nombre'];
        $funcion->descripcion = $data['descripcion'] ?? null;
        $funcion->url = $data['url'] ?? null;
        $funcion->icono = $data['icono'] ?? null;
        $funcion->save();
        $funcion->roles()->sync($data['roles'] ?? []);
        cache()->forget('funciones_with_roles');
        return redirect()->route('funciones.index')->with('status', 'Función actualizada');
    }

    public function destroy(Funcion $funcion)
    {
        $funcion->delete();
        cache()->forget('funciones_with_roles');
        return back()->with('status', 'Función eliminada');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RoleAppVisibility;
use App\Models\Application;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleAppVisibilityController extends Controller
{
    public function index()
    {
        $mappings = RoleAppVisibility::with(['role','app'])->orderBy('role_id')->get();
        $roles = Role::orderBy('name')->get();
        $apps = Application::orderBy('nombre')->get();
        return view('role-apps.index', compact('mappings','roles','apps'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'role_id' => ['required','integer','exists:roles,id'],
            'app' => ['required','string'], // 'core' or app id
        ]);
        $appId = $data['app'] === 'core' ? null : (int) $data['app'];
        if ($appId) {
            $request->validate(['app' => ['exists:applications,id']]);
        }
        RoleAppVisibility::firstOrCreate([
            'role_id' => (int) $data['role_id'],
            'application_id' => $appId,
        ]);
        return back()->with('status', 'Visibilidad asignada');
    }

    public function destroy($role_id, $application_id = null)
    {
        $q = RoleAppVisibility::where('role_id', $role_id);
        if ($application_id === 'core') {
            $q->whereNull('application_id');
        } else {
            $q->where('application_id', $application_id);
        }
        $q->delete();
        return back()->with('status', 'Visibilidad eliminada');
    }
}


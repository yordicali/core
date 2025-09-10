<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query()->with('roles')->where('creador_id', Auth::id());

        if ($search = $request->get('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10)->withQueryString();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = \Spatie\Permission\Models\Role::orderBy('name')->get();
        $apps = \App\Models\Application::orderBy('nombre')->get();
        $roles = $this->filterRolesByCreatorPermissions($roles);
        return view('users.create', compact('roles','apps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'img' => ['nullable', 'string', 'max:255'],
            'app_id' => ['nullable','integer','exists:applications,id'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'img' => $validated['img'] ?? null,
            'creador_id' => Auth::id(),
            'app_id' => $validated['app_id'] ?? null,
        ]);
        if ($request->filled('roles')) {
            $user->syncRoles($request->input('roles'));
        }
        return redirect()->route('users.index')->with('status', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = \Spatie\Permission\Models\Role::orderBy('name')->get();
        $apps = \App\Models\Application::orderBy('nombre')->get();
        $userRoles = $user->roles->pluck('name')->all();
        $roles = $this->filterRolesByCreatorPermissions($roles);
        return view('users.edit', compact('user','roles','userRoles','apps'));
    }

    private function filterRolesByCreatorPermissions($allRoles)
    {
        $creator = auth()->user();
        if (!$creator) return collect();
        $creatorRoleIds = $creator->roles()->pluck('id')->all();
        $allowedIds = \App\Models\RoleCreation::whereIn('role_id', $creatorRoleIds)->pluck('target_role_id')->unique()->all();
        return $allRoles->whereIn('id', $allowedIds);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'img' => ['nullable', 'string', 'max:255'],
            'app_id' => ['nullable','integer','exists:applications,id'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        if (array_key_exists('img', $validated)) {
            $user->img = $validated['img'];
        }
        if (array_key_exists('app_id', $validated)) {
            $user->app_id = $validated['app_id'];
        }
        $user->save();
        if ($request->filled('roles')) {
            $user->syncRoles($request->input('roles'));
        } else {
            $user->syncRoles([]);
        }
        return redirect()->route('users.index')->with('status', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Usuario eliminado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class AppSwitchController extends Controller
{
    public function select(Application $app, Request $request)
    {
        // Verificar visibilidad por rol
        $user = $request->user();
        if ($user) {
            $roleIds = $user->roles()->pluck('id');
            $allowed = \App\Models\RoleAppVisibility::whereIn('role_id', $roleIds)
                ->where('application_id', $app->id)
                ->exists();
            if (!$allowed) {
                abort(403, 'No tiene acceso a esta aplicación');
            }
        }
        $request->session()->put('current_app_id', $app->id);
        // Si no está autenticado, mostrar landing de login de la app
        if (!$request->user()) {
            return redirect()->route('apps.login', $app);
        }
        // Si está autenticado, redirigir a url_inicial o dashboard
        return redirect($app->url_inicial ?: route('dashboard'));
    }

    public function reset(Request $request)
    {
        $request->session()->forget('current_app_id');
        return redirect()->route('dashboard');
    }

    public function login(Application $app)
    {
        session(['current_app_id' => $app->id]);
        return redirect()->route('login');
    }
}

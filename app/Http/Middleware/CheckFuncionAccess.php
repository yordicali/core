<?php

namespace App\Http\Middleware;

use App\Models\Funcion;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckFuncionAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (!$user) {
            return $next($request);
        }

        $path = trim($request->path(), '/'); // e.g. users/1/edit

        // Buscar función por patrón de URL (soporta comodines tipo users* o apps/*)
        $funciones = cache()->remember('funciones_with_roles', 30, function(){
            return Funcion::with('roles:id,name')->whereNotNull('url')->get(['id','url']);
        });

        $match = null;
        foreach ($funciones as $f) {
            if (!$f->url) continue;
            // Normalizar patrón: quitar dominio y el primer '/'
            $pattern = ltrim(parse_url($f->url, PHP_URL_PATH) ?? $f->url, '/');

            // Si no tiene comodín, probamos coincidencia exacta y como prefijo (pattern/*)
            $hasWildcard = str_contains($pattern, '*');
            if ($hasWildcard) {
                if (Str::is($pattern, $path)) { $match = $f; break; }
            } else {
                if ($pattern === $path || Str::is(rtrim($pattern,'/').'/*', $path)) { $match = $f; break; }
            }
        }

        if ($match) {
            // ¿Alguno de los roles del usuario está asignado a la función?
            $userRoleNames = $user->getRoleNames()->toArray();
            $allowed = $match->roles->pluck('name')->intersect($userRoleNames)->isNotEmpty();
            if (!$allowed) {
                return response()->view('errors.no-permission', ['path' => $path], 403);
            }
        }

        return $next($request);
    }
}

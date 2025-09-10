<?php

namespace App\Http\Middleware;

use App\Models\Application;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ShareCurrentApp
{
    public function handle(Request $request, Closure $next)
    {
        $currentApp = null;
        if ($id = $request->session()->get('current_app_id')) {
            $currentApp = Application::with('funciones')->find($id);
        }
        View::share('currentApp', $currentApp);
        return $next($request);
    }
}


<?php

namespace App\Http\Responses;

use App\Models\Application;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $redirect = route('dashboard');
        $appId = session('current_app_id');

        if (!$appId && $request->user() && $request->user()->app_id) {
            $appId = $request->user()->app_id;
            session(['current_app_id' => $appId]);
        }

        if ($appId) {
            $app = Application::find($appId);
            if ($app && $app->url_inicial) {
                $redirect = $app->url_inicial;
            }
        }

        return redirect()->intended($redirect);
    }
}


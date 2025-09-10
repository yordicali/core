<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        $appId = $request->input('app_id');
        if ($appId) {
            return redirect()->route('apps.login', ['app' => $appId]);
        }
        return redirect('/');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Funcion;
use Illuminate\Http\Request;

class AppFuncionController extends Controller
{
    public function index(Application $app)
    {
        $asignadas = $app->funciones()->orderBy('nombre')->get();
        $disponibles = Funcion::orderBy('nombre')->whereNotIn('id', $asignadas->pluck('id'))->get();
        return view('apps.funciones.index', compact('app','asignadas','disponibles'));
    }

    public function store(Request $request, Application $app)
    {
        $data = $request->validate([
            'funcion_id' => ['required','integer','exists:funciones,id']
        ]);
        $app->funciones()->syncWithoutDetaching([$data['funcion_id']]);
        return back()->with('status', 'Función agregada a la app');
    }

    public function destroy(Application $app, Funcion $funcion)
    {
        $app->funciones()->detach($funcion->id);
        return back()->with('status', 'Función removida de la app');
    }
}


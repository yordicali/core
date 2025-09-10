<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $apps = Application::when($q, function ($query) use ($q) {
                $query->where('nombre', 'like', "%{$q}%")
                      ->orWhere('descripcion_corta', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('apps.index', compact('apps'));
    }

    public function create()
    {
        return view('apps.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required','string','max:255'],
            'logo' => ['nullable','string','max:255'],
            'descripcion_larga' => ['nullable','string'],
            'descripcion_corta' => ['nullable','string','max:255'],
            'icono' => ['nullable','string','max:255'],
            'color_base' => ['nullable','string','max:32'],
            'url_inicial' => ['nullable','string','max:255'],
            'estado' => ['required','in:disponible,inactiva'],
        ]);

        $path = $validated['logo'] ?? null; // ruta seleccionada del gestor

        Application::create([
            'nombre' => $validated['nombre'],
            'logo' => $path,
            'descripcion_larga' => $validated['descripcion_larga'] ?? null,
            'descripcion_corta' => $validated['descripcion_corta'] ?? null,
            'icono' => $validated['icono'] ?? null,
            'color_base' => $validated['color_base'] ?? null,
            'creador_id' => Auth::id(),
            'estado' => $validated['estado'],
            'url_inicial' => $validated['url_inicial'] ?? null,
        ]);

        return redirect()->route('apps.index')->with('status', 'App creada correctamente');
    }

    public function show(Application $app)
    {
        return view('apps.show', ['app' => $app]);
    }

    public function edit(Application $app)
    {
        return view('apps.edit', ['app' => $app]);
    }

    public function update(Request $request, Application $app)
    {
        $validated = $request->validate([
            'nombre' => ['required','string','max:255'],
            'logo' => ['nullable','string','max:255'],
            'descripcion_larga' => ['nullable','string'],
            'descripcion_corta' => ['nullable','string','max:255'],
            'icono' => ['nullable','string','max:255'],
            'color_base' => ['nullable','string','max:32'],
            'url_inicial' => ['nullable','string','max:255'],
            'estado' => ['required','in:disponible,inactiva'],
        ]);

        if (array_key_exists('logo', $validated)) {
            // Ruta desde el gestor
            $app->logo = $validated['logo'];
        }

        $app->nombre = $validated['nombre'];
        $app->descripcion_larga = $validated['descripcion_larga'] ?? null;
        $app->descripcion_corta = $validated['descripcion_corta'] ?? null;
        $app->icono = $validated['icono'] ?? null;
        $app->color_base = $validated['color_base'] ?? null;
        $app->estado = $validated['estado'];
        $app->url_inicial = $validated['url_inicial'] ?? null;
        $app->save();

        return redirect()->route('apps.index')->with('status', 'App actualizada correctamente');
    }

    public function destroy(Application $app)
    {
        if ($app->logo) {
            Storage::disk('public')->delete($app->logo);
        }
        $app->delete();

        return redirect()->route('apps.index')->with('status', 'App eliminada');
    }
}

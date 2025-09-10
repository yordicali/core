<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->get('q');
        $archivos = Archivo::where('creador_id', auth()->id())
            ->when($q, function ($query) use ($q) {
                $query->where('nombre_original', 'like', "%{$q}%");
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        if ($request->ajax() || $request->boolean('partial')) {
            return view('archivos._table', compact('archivos'));
        }

        $totalCount = Archivo::where('creador_id', auth()->id())->count();
        $totalSize = (int) Archivo::where('creador_id', auth()->id())->sum('size');

        return view('archivos.index', compact('archivos', 'totalCount', 'totalSize'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required','file'],
        ]);

        $file = $request->file('file');
        $path = $file->store('archivos', 'public');

        $archivo = Archivo::create([
            'ruta' => $path, // p.ej. archivos/abc.pdf
            'nombre_original' => $file->getClientOriginalName(),
            'mime' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'creador_id' => auth()->id(),
        ]);

        if ($request->ajax()) {
            $totalCount = Archivo::where('creador_id', auth()->id())->count();
            $totalSize = (int) Archivo::where('creador_id', auth()->id())->sum('size');
            return response()->json([
                'message' => 'Archivo subido',
                'archivo' => $archivo,
                'url' => asset('storage/'.$archivo->ruta),
                'total_count' => $totalCount,
                'total_size' => $totalSize,
            ], 201);
        }

        return back()->with('status', 'Archivo subido');
    }

    public function destroy(Archivo $archivo)
    {
        if ($archivo->ruta) {
            Storage::disk('public')->delete($archivo->ruta);
        }
        $archivo->delete();

        return back()->with('status', 'Archivo eliminado');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'logo',
        'descripcion_larga',
        'descripcion_corta',
        'icono',
        'color_base',
        'creador_id',
        'estado',
        'url_inicial',
    ];

    public function creador()
    {
        return $this->belongsTo(User::class, 'creador_id');
    }

    public function funciones()
    {
        return $this->belongsToMany(\App\Models\Funcion::class, 'application_funcion', 'application_id', 'funcion_id');
    }
}

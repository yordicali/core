<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Storage;
use App\Models\Application;
use App\Models\User;
use App\Models\Archivo;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\FuncionController;
use App\Http\Controllers\AppFuncionController;
use App\Http\Controllers\AppSwitchController;
use App\Http\Controllers\RoleCreationController;
use App\Http\Controllers\RoleAppVisibilityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Fallback para servir archivos de storage/public si no existe el symlink
Route::get('/storage/{path}', function ($path) {
    if (Storage::disk('public')->exists($path)) {
        return response()->file(storage_path('app/public/' . $path));
    }
    abort(404);
})->where('path', '.*');

// Selección y login de App (públicas)
Route::get('apps/select/{app}', [AppSwitchController::class,'select'])->name('apps.select');
Route::get('apps/login/{app}', [AppSwitchController::class,'login'])->name('apps.login');
Route::get('apps/reset', [AppSwitchController::class,'reset'])->name('apps.reset');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'funcion.access'
])->group(function () {
    Route::get('/dashboard', function () {
        $appsCount = Application::count();
        $usersCount = User::count();
        $filesCount = Archivo::count();
        $filesBytes = (int) Archivo::sum('size');

        return view('dashboard', compact('appsCount', 'usersCount', 'filesCount', 'filesBytes'));
    })->name('dashboard');

    // Users CRUD
    Route::resource('users', UserController::class);

    // Apps CRUD
    Route::resource('apps', ApplicationController::class)->parameters([
        'apps' => 'app'
    ]);
    // Funciones por App
    Route::get('apps/{app}/funciones', [AppFuncionController::class,'index'])->name('apps.funciones.index');
    Route::post('apps/{app}/funciones', [AppFuncionController::class,'store'])->name('apps.funciones.store');
    Route::delete('apps/{app}/funciones/{funcion}', [AppFuncionController::class,'destroy'])->name('apps.funciones.destroy');

    // Gestor de Archivos
    Route::get('archivos', [ArchivoController::class, 'index'])->name('archivos.index');
    Route::post('archivos', [ArchivoController::class, 'store'])->name('archivos.store');
    Route::delete('archivos/{archivo}', [ArchivoController::class, 'destroy'])->name('archivos.destroy');

    // Roles y Permisos
    Route::resource('roles', RoleController::class)->except(['show']);
    // Permisos de creación de roles para usuarios
    Route::get('role-permissions', [RoleCreationController::class,'index'])->name('role-permissions.index');
    Route::post('role-permissions', [RoleCreationController::class,'store'])->name('role-permissions.store');
    Route::delete('role-permissions/{role_id}/{target_role_id}', [RoleCreationController::class,'destroy'])->name('role-permissions.destroy');

    // Visibilidad de Apps por Rol (incluye CoreTvo)
    Route::get('role-apps', [RoleAppVisibilityController::class,'index'])->name('role-apps.index');
    Route::post('role-apps', [RoleAppVisibilityController::class,'store'])->name('role-apps.store');
    Route::delete('role-apps/{role_id}/{application_id}', [RoleAppVisibilityController::class,'destroy'])->name('role-apps.destroy');
    Route::resource('funciones', FuncionController::class)
        ->parameters(['funciones' => 'funcion'])
        ->except(['show']);
});

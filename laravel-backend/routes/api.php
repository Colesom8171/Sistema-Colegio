<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\TareaEntregadaController;

// Rutas de autenticación
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Rutas protegidas por autenticación (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user()->load('role'); // Devuelve el usuario autenticado con su rol
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    // Rutas API Resource para operaciones CRUD estándar
    // Aquí puedes aplicar middleware de autorización si es necesario
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('usuarios', UserController::class);
    Route::apiResource('cursos', CursoController::class);
    Route::apiResource('notas', NotaController::class);
    Route::apiResource('asistencia', AsistenciaController::class);
    Route::apiResource('tareas', TareaController::class);
    Route::apiResource('tareas-entregadas', TareaEntregadaController::class);

    // Ejemplo de cómo aplicar un middleware de autorización (Gate) a una ruta específica:
    // Route::get('roles', [RoleController::class, 'index'])->middleware('can:admin-director-access');
    Route::get('/usuarios', [UserController::class, 'index']);
});

// Ruta de prueba pública
Route::get('/prueba', function () {
    return response()->json(['mensaje' => 'Funciona']);
});
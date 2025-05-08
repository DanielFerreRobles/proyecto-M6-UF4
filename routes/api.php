<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TarjetaController;
use App\Http\Controllers\AuthController;

// GET - Ver todas las tarjetas
Route::get('/tarjetas', [TarjetaController::class, 'index']);

// POST - Crear una nueva tarjeta
Route::post('/tarjetas', [TarjetaController::class, 'store']);

// SHOW - Ver una sola tarjeta por ID
Route::get('/tarjetas/{id}', [TarjetaController::class, 'show']);

// PUT - Actualizar completamente una tarjeta
Route::put('/tarjetas/{id}', [TarjetaController::class, 'update']);

// PATCH - Actualizar parcialmente una tarjeta
Route::patch('/tarjetas/{id}', [TarjetaController::class, 'updatePartial']);

// DELETE - Eliminar una tarjeta
Route::delete('/tarjetas/{id}', [TarjetaController::class, 'destroy']);


//RUTAS PUBLICAS
// POST - Registrar un nuevo usuario
Route::post('register', [AuthController::class, 'register']);

// POST - Iniciar sesión
Route::post('login', [AuthController::class, 'login']);

// GET - Ver todas las tarjetas
Route::get('/tarjetas', [TarjetaController::class, 'getTarjetas']);

// SHOW - Ver una sola tarjeta por ID
Route::get('/tarjetas/{id}', [TarjetaController::class, 'getTarjeta']);

 //RUTAS PROTEGIDAS
Route::middleware(['auth:api'])->group(function () {

    Route::post ('logout', [AuthController::class, 'logout']);
    Route::get ('me', [AuthController::class, 'getUser']);
    Route::post ('tarjetas', [AuthController::class, 'addTarjeta']);
});

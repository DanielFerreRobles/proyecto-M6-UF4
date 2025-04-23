<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TarjetaController;

// GET - Ver todas las tarjetas
Route::get('/tarjetas', [TarjetaController::class, 'index']);

// POST - Crear una nueva tarjeta
Route::post('/tarjetas', [TarjetaController::class, 'store']);

// GET - Ver una sola tarjeta por ID
Route::get('/tarjetas/{id}', [TarjetaController::class, 'show']);

// PUT - Actualizar completamente una tarjeta
Route::put('/tarjetas/{id}', [TarjetaController::class, 'update']);

// PATCH - Actualizar parcialmente una tarjeta
Route::patch('/tarjetas/{id}', [TarjetaController::class, 'updatePartial']);

// DELETE - Eliminar una tarjeta
Route::delete('/tarjetas/{id}', [TarjetaController::class, 'destroy']);

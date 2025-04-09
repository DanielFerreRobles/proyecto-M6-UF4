<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/students', function () { return 'Listando estudiantes'; });

Route::post('/students', function () { return 'Creando estudiante'; });
Route::put('/students/{id}', function () { return 'Actualizando estudiante';
});
Route::delete('/students/{id}', function () { return 'Eliminando estudiante'; });
Route::get('/students/{id}', function () { return 'Obteniendo estudiante'; });

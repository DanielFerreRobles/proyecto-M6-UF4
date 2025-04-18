<?php

use App\Http\Controllers\Api\TarjetaController;

Route::get('/tarjetas', [TarjetaController::class, 'index']);

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarjeta;

class TarjetaController extends Controller
{
    public function index()
    {
        $tarjetas = Tarjeta::all();
        return response()->json(['tarjetas' => $tarjetas], 200);
    }
}

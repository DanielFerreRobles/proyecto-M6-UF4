<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tarjeta;


class TarjetaController extends Controller
{
    // GET - Ver todas las tarjetas
    public function index()
    {
        $tarjetas = Tarjeta::all();
        return response()->json(['tarjetas' => $tarjetas], 200);
    }

    // STORE - Crear una nueva tarjeta
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'img' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $tarjeta = Tarjeta::create($request->all());

        return response()->json(['tarjeta' => $tarjeta], 201);
    }

    // SHOW - Ver una tarjeta por ID
    public function show($id)
    {
        $tarjeta = Tarjeta::find($id);

        if (!$tarjeta) {
            return response()->json(['message' => 'Tarjeta no encontrada'], 404);
        }

        return response()->json(['tarjeta' => $tarjeta], 200);
    }

    // UPDATE - Actualizar completamente una tarjeta
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'img' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $tarjeta = Tarjeta::find($id);

        if (!$tarjeta) {
            return response()->json(['message' => 'Tarjeta no encontrada'], 404);
        }

        $tarjeta->update($request->all());

        return response()->json(['tarjeta' => $tarjeta], 200);
    }

    // UPDATE PARTIAL - Actualizar parcialmente una tarjeta
    public function updatePartial(Request $request, $id)
    {
        $tarjeta = Tarjeta::find($id);

        if (!$tarjeta) {
            return response()->json(['message' => 'Tarjeta no encontrada'], 404);
        }

        $tarjeta->update($request->only(['nombre', 'img']));

        return response()->json(['tarjeta' => $tarjeta], 200);
    }

    // DESTROY - Eliminar una tarjeta
    public function destroy($id)
    {
        $tarjeta = Tarjeta::find($id);

        if (!$tarjeta) {
            return response()->json(['message' => 'Tarjeta no encontrada'], 404);
        }

        $tarjeta->delete();

        return response()->json(['message' => 'Tarjeta eliminada correctamente'], 200);
    }
}

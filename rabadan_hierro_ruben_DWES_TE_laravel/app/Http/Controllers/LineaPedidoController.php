<?php

namespace App\Http\Controllers;

use App\Models\LineaPedidos;
use Illuminate\Http\Request;

class LineaPedidoController extends Controller
{
    public function index()
    {
        return LineaPedidos::with(['pedidoRelacion', 'articuloRelacion'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pedido' => 'required|exists:pedidos,id',
            'articulo' => 'required|exists:articulos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        $linea = LineaPedidos::create($validated);
        return response()->json($linea, 201);
    }

    public function update(Request $request, $id)
    {
        $linea = LineaPedidos::findOrFail($id);

        $validated = $request->validate([
            'cantidad' => 'sometimes|integer|min:1',
            'precio' => 'sometimes|numeric|min:0',
        ]);

        $linea->update($validated);
        return response()->json($linea);
    }

    public function destroy($id)
    {
        $linea = LineaPedidos::find($id);

        if (!$linea) {
            return response()->json(['error' => 'Línea de pedido no encontrada'], 404);
        }

        $linea->delete();
        return response()->json(['mensaje' => 'Línea de pedido eliminada correctamente']);
    }
}

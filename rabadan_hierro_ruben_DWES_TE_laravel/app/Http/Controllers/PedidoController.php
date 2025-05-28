<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DateTime;

class PedidoController extends Controller
{
    public function index()
    {
       $pedidos = \App\Models\Pedido::with(['clienteRelacion', 'vendedorRelacion', 'lineas'])->get();

        return response()->json($pedidos);
    }

    public function show($id)
    {
        $pedido = Pedido::with(['clienteRelacion', 'vendedorRelacion', 'lineas'])->find($id);

        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        return response()->json([
            'ID' => $pedido->ID,
            'CLIENTE' => $pedido->CLIENTE,
            'cliente' => $pedido->clienteRelacion,
            'VENDEDOR' => $pedido->VENDEDOR,
            'vendedor' => $pedido->vendedorRelacion,
            'TOTAL' => $pedido->TOTAL,
            'FECHA' => $pedido->FECHA,
            'ESTADO' => $pedido->ESTADO,
            'lineas' => $pedido->lineas,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'CLIENTE' => 'required|exists:cliente,ID',
            'VENDEDOR' => 'required|exists:vendedor,ID',
            'FECHA' => 'required|date',
            'ESTADO' => 'required|in:pendiente,enviado,cancelado',
            'TOTAL' => 'required|numeric|min:0',
        ]);

        $pedido = Pedido::create($validated);

        return response()->json([
            'mensaje' => 'Pedido creado correctamente',
            'pedido' => $pedido
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        $fechaPedido = new DateTime($pedido->FECHA);
        $fechaActual = new DateTime();
        $diferencia = $fechaActual->diff($fechaPedido)->days;

        if ($diferencia > 5) {
            return response()->json(['error' => 'El pedido no puede modificarse porque tiene más de 5 días'], 403);
        }

        $validated = $request->validate([
            'CLIENTE' => 'sometimes|exists:cliente,ID',
            'VENDEDOR' => 'sometimes|exists:vendedor,ID',
            'FECHA' => 'sometimes|date',
            'ESTADO' => 'sometimes|in:pendiente,enviado,cancelado',
            'TOTAL' => 'sometimes|numeric|min:0',
        ]);

        $pedido->update($validated);

        return response()->json([
            'mensaje' => 'Pedido actualizado correctamente',
            'pedido' => $pedido
        ]);
    }

    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        $fechaPedido = new DateTime($pedido->FECHA);
        $fechaActual = new DateTime();

        if ($fechaPedido <= $fechaActual) {
            return response()->json(['error' => 'El pedido no puede eliminarse porque la fecha no es futura'], 403);
        }

        if (strtolower($pedido->ESTADO) !== 'pendiente') {
            return response()->json(['error' => 'Solo se pueden eliminar pedidos con estado pendiente'], 403);
        }

        $pedido->delete();

        return response()->json(['mensaje' => 'Pedido y sus líneas eliminados correctamente']);
    }
}

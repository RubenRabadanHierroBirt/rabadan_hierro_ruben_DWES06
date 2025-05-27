<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return Pedido::with(['clienteRelacion', 'vendedorRelacion', 'lineas'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cliente' => 'required|exists:clientes,id',
            'vendedor' => 'required|exists:vendedores,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:pendiente,enviado,cancelado',
            'total' => 'required|numeric|min:0',
        ]);

        $pedido = Pedido::create($validated);
        return response()->json($pedido, 201);
    }

    public function show($id)
    {
        return Pedido::with(['clienteRelacion', 'vendedorRelacion', 'lineas'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $validated = $request->validate([
            'cliente' => 'sometimes|exists:clientes,id',
            'vendedor' => 'sometimes|exists:vendedores,id',
            'fecha' => 'sometimes|date',
            'estado' => 'sometimes|in:pendiente,enviado,cancelado',
            'total' => 'sometimes|numeric|min:0',
        ]);

        $pedido->update($validated);
        return response()->json($pedido);
    }

    public function destroy($id)
    {
        Pedidos::destroy($id);
        return response()->json(['mensaje' => 'Pedido eliminado correctamente']);
    }

    public function porCliente($cliente_id)
    {
        $pedidos = Pedido::where('cliente', $cliente_id)->get();

        if ($pedidos->isEmpty()) {
            return response()->json(['mensaje' => 'No hay pedidos para este cliente'], 404);
        }

        return response()->json($pedidos);
    }

    public function porVendedor($vendedor_id)
    {
        $pedidos = Pedido::where('vendedor', $vendedor_id)->get();

        if ($pedidos->isEmpty()) {
            return response()->json(['mensaje' => 'No hay pedidos para este vendedor'], 404);
        }

        return response()->json($pedidos);
    }


}

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
        return Pedido::create($request->all());
    }

    public function show($id)
    {
        return Pedido::with(['clienteRelacion', 'vendedorRelacion', 'lineas'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());
        return $pedido;
    }

    public function destroy($id)
    {
        return Pedido::destroy($id);
    }
}

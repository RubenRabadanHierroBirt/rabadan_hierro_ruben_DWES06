<?php

namespace App\Http\Controllers;

use App\Models\LineaPedido;
use Illuminate\Http\Request;

class LineaPedidoController extends Controller
{
    public function index()
    {
        return LineaPedido::with(['pedidoRelacion', 'articuloRelacion'])->get();
    }

    public function store(Request $request)
    {
        return LineaPedido::create($request->all());
    }

    public function show($id)
    {
        return LineaPedido::with(['pedidoRelacion', 'articuloRelacion'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $linea = LineaPedido::findOrFail($id);
        $linea->update($request->all());
        return $linea;
    }

    public function destroy($id)
    {
        return LineaPedido::destroy($id);
    }
}

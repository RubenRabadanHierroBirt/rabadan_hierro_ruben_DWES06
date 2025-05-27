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
        return LineaPedidos::create($request->all());
    }

    public function show($id)
    {
        return LineaPedidos::with(['pedidoRelacion', 'articuloRelacion'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $linea = LineaPedidos::findOrFail($id);
        $linea->update($request->all());
        return $linea;
    }

    public function destroy($id)
    {
        return LineaPedidos::destroy($id);
    }
}

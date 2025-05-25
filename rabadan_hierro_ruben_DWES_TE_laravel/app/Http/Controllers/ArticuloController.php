<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    
    public function index()
{
    return Articulo::all(); 
}

public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required',
        'descripcion' => 'nullable',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
    ]);

    $articulo = Articulo::create($validated);
    return response()->json($articulo, 201);
}

public function show(Articulo $articulo)
{
    return $articulo;
}

public function update(Request $request, Articulo $articulo)
{
    $articulo->update($request->all());
    return response()->json($articulo);
}

public function destroy(Articulo $articulo)
{
    $articulo->delete();
    return response()->json(null, 204);
}

}

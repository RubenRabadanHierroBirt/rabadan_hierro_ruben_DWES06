<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        return Vendedor::all();
    }

    public function store(Request $request)
    {
        return Vendedor::create($request->all());
    }

    public function show($id)
    {
        return Vendedor::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->update($request->all());
        return $vendedor;
    }

    public function destroy($id)
    {
        return Vendedor::destroy($id);
    }
}

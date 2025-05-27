<?php

namespace App\Http\Controllers;

use App\Services\MicroservicioTry;
use Illuminate\Http\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;


class StockController extends Controller
{
    private $try;

    public function __construct(MicroservicioTry $try)
    {
        $this->try = $try;
    }
    public function listar()
    {
        if (!$this->try->isAvailable()) {
            return response()->json([
                'error' => 'Microservicio no disponible',
                'message' => 'No se pudo conectar al microservicio de stock.'
            ], 503);
        }

        try {
            $response = Http::timeout(3)->get("http://127.0.0.1:8080/api/stock");
            return response()->json($response->json(), $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al obtener listado de stock',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    public function consultar($id)
    {
        if (!$this->try->isAvailable()) {
            return response()->json([
                'error' => 'Microservicio no disponible',
                'message' => 'No se pudo conectar al microservicio de stock.'
            ], 503);
        }

        try {
            $response = $this->try->consultar($id);
            return response()->json($response->json(), $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al consultar stock',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function crear(Request $request)
    {
        if (!$this->try->isAvailable()) {
            return response()->json([
                'error' => 'Microservicio no disponible',
                'message' => 'No se pudo conectar al microservicio de stock.'
            ], 503);
        }

        try {
            $response = $this->try->crear([
                'articuloId' => $request->input('articuloId'),
                'cantidad' => $request->input('cantidad'),
            ]);
            return response()->json($response->json(), $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear stock',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function actualizar(Request $request, $id)
    {
        if (!$this->try->isAvailable()) {
            return response()->json([
                'error' => 'Microservicio no disponible',
                'message' => 'No se pudo conectar al microservicio de stock.'
            ], 503);
        }

        try {
            $response = $this->try->actualizar($id, [
                'cantidad' => $request->input('cantidad'),
            ]);
            return response()->json($response->json(), $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar stock',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

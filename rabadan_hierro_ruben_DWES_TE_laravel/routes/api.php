<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\LineaPedidoController;
use App\Http\Controllers\StockController;

Route::apiResource('articulos', ArticuloController::class);
Route::apiResource('vendedores', VendedorController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('pedidos', PedidoController::class);
Route::apiResource('lineapedidos', LineaPedidoController::class);


Route::get('pedidos/cliente/{cliente_id}', [PedidoController::class, 'porCliente']);
Route::get('pedidos/vendedor/{vendedor_id}', [PedidoController::class, 'porVendedor']);


Route::get('/stock', [StockController::class, 'listar']);
Route::get('/stock/{id}', [StockController::class, 'consultar']);
Route::post('/stock', [StockController::class, 'crear']);
Route::put('/stock/{id}', [StockController::class, 'actualizar']);
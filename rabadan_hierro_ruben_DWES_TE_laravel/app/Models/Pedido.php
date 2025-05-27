<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LineaPedidos;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = ['cliente', 'vendedor', 'total', 'fecha', 'estado'];

    public function clienteRelacion()
    {
        return $this->belongsTo(Cliente::class, 'cliente');
    }

    public function vendedorRelacion()
    {
        return $this->belongsTo(Vendedor::class, 'vendedor');
    }

    public function lineas()
    {
        return $this->hasMany(LineaPedidos::class, 'pedido');
    }
}

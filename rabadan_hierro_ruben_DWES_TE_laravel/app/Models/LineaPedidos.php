<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaPedido extends Model
{
    protected $table = 'linea_pedidos';

    protected $fillable = ['pedido', 'articulo', 'cantidad', 'precio'];

    public function pedidoRelacion()
    {
        return $this->belongsTo(Pedido::class, 'pedido');
    }

    public function articuloRelacion()
    {
        return $this->belongsTo(Articulo::class, 'articulo');
    }
}

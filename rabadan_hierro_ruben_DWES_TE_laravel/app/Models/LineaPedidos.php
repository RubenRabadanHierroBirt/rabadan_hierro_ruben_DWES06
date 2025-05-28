<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaPedidos extends Model
{

    protected $table = 'linea_pedido';

    protected $fillable = ['pedido', 'articulo', 'cantidad', 'precio'];
    public $timestamps = false;
    public function pedidoRelacion()
    {
        return $this->belongsTo(Pedido::class, 'pedido');
    }

    public function articuloRelacion()
    {
        return $this->belongsTo(Articulo::class, 'articulo');
    }
}

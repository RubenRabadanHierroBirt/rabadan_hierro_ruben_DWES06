<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'CLIENTE',
        'VENDEDOR',
        'TOTAL',
        'FECHA',
        'ESTADO'
    ];

    public function clienteRelacion()
    {
        return $this->belongsTo(Cliente::class, 'CLIENTE');
    }

    public function vendedorRelacion()
    {
        return $this->belongsTo(Vendedor::class, 'VENDEDOR');
    }

    public function lineas()
    {
        return $this->hasMany(LineaPedidos::class, 'PEDIDO');
    }
}

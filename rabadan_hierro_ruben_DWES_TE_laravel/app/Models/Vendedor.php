<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedores';

    protected $fillable = ['nombre', 'email', 'telefono'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'vendedor');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock'];

    public function lineasPedido()
    {
        return $this->hasMany(LineaPedido::class, 'articulo');
    }
}


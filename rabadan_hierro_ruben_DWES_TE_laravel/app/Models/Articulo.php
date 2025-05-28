<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulo';

    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock'];
    public $timestamps = false;

    public function lineasPedido()
    {
        return $this->hasMany(LineaPedido::class, 'articulo');
    }
}


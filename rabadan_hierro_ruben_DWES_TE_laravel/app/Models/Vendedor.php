<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedor';
    protected $primaryKey = 'ID';
    public $timestamps = false;
  
    protected $fillable = ['nombre', 'email', 'telefono', 'direccion'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'vendedor');
    }
}

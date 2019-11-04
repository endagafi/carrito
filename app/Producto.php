<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'precio', 'stock', 'detalle', 'imagen'
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    public function accesorios(){
        return $this->hasMany(Accesorio::class);
    }
}

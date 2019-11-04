<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessorio extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nombre', 'precio', 'stock', 'detalle', 'imagen'
    ];

    public function productos(){
        return $this->hasMany(Producto::class);
    }

}

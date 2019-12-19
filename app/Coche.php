<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{

	protected $fillable = [
        "numeroBastidor","marca","modelo","precio","año","detalle","imagen"
    ];
    public function venta()
    {
       return $this->belongsTo(\App\Venta::class);
    }
}

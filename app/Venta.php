<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Venta extends Model
{
    use Notifiable;
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_cliente','id_empleado','dni_cliente','bastidorCoche','renta','licenciaConducir','estado',
    ];
    public function user()
    {
       return $this->hasMany(\App\User::class);
    }
    public function coche()
    {
       return $this->hasMany(\App\Coche::class);
    }
}

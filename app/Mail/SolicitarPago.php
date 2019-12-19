<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Venta;
use App\User;
use App\Coche;
use Session;
use View;
use Request;

class SolicitarPago extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Venta $venta)
    {
        $this->venta = $venta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $cliente = User::findOrFail($this->venta->id_cliente);
        $empleado = User::findOrFail($this->venta->id_empleado);
        
        $coches = Coche::all();
        $coche;
        foreach ($coches as $cocheBuscar) {
            if($this->venta->bastidorCoche === $cocheBuscar->numeroBastidor) {
                $coche = $cocheBuscar;
            }
        }
        session(['ventaPendiente' => $this->venta]);
        session(['coche' => $coche]);
        $url = Request::root();// obtengo el dominio de la url
        //dd($url);
        $email = $this->view('pago.solicitarPago')->with([
            "venta" => $this->venta,
            "coche" => $coche,
            "url" => $url
         ]);
    }
}

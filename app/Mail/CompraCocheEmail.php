<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Venta;
use App\User;
use App\Coche;
use PDF;

class CompraCocheEmail extends Mailable
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
        $pdf = PDF::loadView('venta.pdfCompra',
            [
                'venta' => $this->venta,
                'cliente' => $cliente,
                'empleado' => $empleado,
                'coche' => $coche,
            ])->save('pdfCompra');
        $email = $this->view('email.compra')
        ->from('oscar@gmail.com','Administrador')
        ->subject('Gracias por su compra.');
        $email->attachData($pdf->output(), 'pdfCompra.pdf');
    }
}

<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\User;
use App\Venta;
use App\Coche;
use App\Traits\Bastidor;
use App\Mail\CompraCocheEmail;
use App\Mail\SolicitarPago;
use Auth;
use Mail;
use Session;
use Carbon\Carbon;

class ExcelExport implements FromView
{
    public function view(): View
    {
    	$user = Auth::user(); // obtengo el usuario actualmente logueado
        $ventas = Venta::all();
        $usuarios = User::all();
        $coches = Coche::all();
        $estados  = [];
        $contadorVentasCliente = 0;
        $contadorVentasEmpleado = 0;
        foreach ($ventas as $key => $venta) {
            if($user->id == $venta->id_cliente){
                $contadorVentasCliente++;
            }
            if($user->id == $venta->id_empleado){
                $contadorVentasEmpleado++;
            }
            if(!in_array($venta->estado, $estados, true)){
                array_push($estados, $venta->estado);//me guardo los estados sin repetirse
            }
        }
        //dd($contadorVentasEmpleado);
        return view("venta.excel",
            [
                "ventas"=>$ventas,
                "usuarios"=>$usuarios,
                "coches"=>$coches,
                "estados"=>$estados,
                "user" => $user,
                "contadorVentasEmpleado" => $contadorVentasEmpleado,
                "contadorVentasCliente" => $contadorVentasCliente
            ]);
    }
}
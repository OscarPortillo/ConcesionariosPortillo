<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generarMatricula() {
    	$matricula ="";
    	$letras = "ABCDEFGHJKMNPTUVWXYZ";
    	$numeros = "123456789";
    	for ($i = 0; $i < 3; $i++) {
    		$matricula .= $letras[rand(0,strlen($letras)-1)];
    	}
    	$matricula .= " ";
    	for ($i = 0; $i < 4; $i++) {
    		$matricula .= $numeros[rand(0,strlen($numeros)-1)];
    	}
    	return $matricula;
    }

    public function generarBastidor() {
       
        $bastidor = "";
        $continente = "E";
        $pais = "E";
        $letras = "ABCDEFGHJKMNPRTUVWXYZ0123456789";
        $transmición = "MA";
        $ubicacion = "MZBSV"; //madrid zaragoza, barcelona, samalanca
        $bastidor .= $continente . $pais . $letras[rand(0,strlen($letras)-1)] . $letras[rand(0,strlen($letras)-1)] ; //continente+pais+fabricante+modelo  digito del 1 al 4
        for ($i = 0; $i < 4; $i++) {
            $bastidor .= $letras[rand(0,strlen($letras)-1)];//Características del tipo de motorización: tipo de alimentación, familia del motor, etc. digito del 5 al 8
        }
        $bastidor .= $transmición[rand(0,strlen($transmición))-1];//trasnmición manual digito 9
        $bastidor .= $letras[rand(0,strlen($letras))-1];//año de fabricante
        $bastidor .= $ubicacion[rand(0,strlen($ubicacion))-1];//Dígito 11. Ubicación de la planta de producción
        for ($i = 0; $i < 6; $i++) {
            $bastidor .= $letras[rand(0,strlen($letras))-1];//Dígitos 12-17. Número de producción del fabricante en el cual queda
        }
        //Para hacer esto me lo saqué de aquí:   https://blog.reparacion-vehiculos.es/numero-de-bastidor
        return $bastidor;
    }
}

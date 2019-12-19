<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coche;
use App\User;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //aplicable a todos los métodos
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$user = Auth::user(); // obtengo el usuario actualmente logueado
        $TodosLosCoches = Coche::all();
        $coches =[];
        foreach ( $TodosLosCoches as $coche ) {
            if( $coche->matricula == null ){
                array_push( $coches, $coche );// Esto para separar los coches que están ya vendidos ( lo que ya tienen matricula asignada)
            }
        }
        return view('coche.index',
            [
                'coches'=>$coches,
                'user' => $user
            ]);*/
        return view('home');
    }
}

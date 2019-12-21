<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Venta;
use App\Coche;
use Session;
use Auth;

class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(){
        /*$user = Auth::user(); // obtengo el usuario actualmente logueado        
        $venta = Session('ventaPendiente');
        $coche = Session('coche');
        if (Session::has('ventaPendiente') && Session::has('coche')){
            //dd('La sesion ventaPendiente existe');
            if($user->id === $venta->id_cliente){
                //dd('Es de este usuario');
                return view('pago.pagar',[
                "venta" => $venta,
                "coche" => $coche
                ]);
            } else {
                session(['errorCliente' => "Usted no está autorizado a realizar el pago"]);
                $errorCliente = Session('errorCliente');
                //dd($errorCliente);
                return view('errors.403',["errorCliente" => $errorCliente]);
            }
        }else{
            dd();
            return view('pago.pagar',[
                "venta" => $venta,
                "coche" => $coche
                ]);
        }

		/*return view('pago.pagar',[
            "venta" => $venta,
            "coche" => $coche
        ]);*/
	}
	public function pago(Request $request)
    {
    	//dd($request->all());
        try {
            Stripe::setApiKey(config('services.stripe.secret'));
        $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));
        $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => $request->precioCoche,
                'currency' => 'usd'
            ));
        $venta = Venta::findOrFail($request->venta);
        $venta->estado =  'Pagado';// pongo el estado a pagado
        $venta->abonado =  $request->precioCoche;
        $venta->save();//actualizo la tabla con el precio del coche
        return redirect('/ventas');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function edit($id){
        $venta = Venta::findOrFail($id);
        $coches = Coche::all();//obtengo todos los coches
        foreach ($coches as $cocheUnico) {
            if( $cocheUnico->numeroBastidor === $venta->bastidorCoche){
                $coche = $cocheUnico;
            }
        }
        return view('pago.pagar',[
                "venta" => $venta,
                "coche" => $coche
                ]);
    }
}
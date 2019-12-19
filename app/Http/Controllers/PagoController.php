<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Venta;
use Session;
use Illuminate\Http\Request;

class PagoController extends Controller
{
	public function index(){
        $venta = session('ventaPendiente');
        $coche = session('coche');
		return view('pago.pagar',[
            "venta" => $venta,
            "coche" => $coche
        ]);
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
}
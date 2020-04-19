<?php

namespace App\Http\Controllers;
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
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExport;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function comprar($id){

        $user = Auth::user(); // el usuario actualmente logueado
        $coche = Coche::findOrFail($id);//busco el coche que se desea comprar
        return view("venta.create",
            [
                "user"=>$user,
                "coche"=>$coche
            ]);
        
    }
    public function store(Request $request) {
        $user = Auth::user();
        $usuarios = User::all();
        $todosLosEmpleados =[];
        foreach ( $usuarios as $usuario) {
            if($usuario->role_id == 2) {
                array_push($todosLosEmpleados,$usuario);
            }            
        }
        //dd($todosLosEmpleados);
        $longitud = count($todosLosEmpleados);
        $numAleatorio = rand(0, $longitud-1);
        $empleado = $todosLosEmpleados[$numAleatorio];//me guardo un empleado aleatorio al que le asigno hacer la venta
        $dni_cliente = "";
        $renta =  "";
        $carneConducir = "";
        if($request->hasFile("dni_cliente")){
            $archivo = $request->file("dni_cliente");
            $dni_cliente = time().$archivo->getClientOriginalName();
            $archivo->move(public_path()."/archivos",$dni_cliente);
        }
        if($request->hasFile("renta")){
            $archivo = $request->file("renta");
            $renta = time().$archivo->getClientOriginalName();
            $archivo->move(public_path()."/archivos",$renta);
        }
        if($request->hasFile("carneConducir")){
            $archivo = $request->file("carneConducir");
            $carneConducir = time().$archivo->getClientOriginalName();
            $archivo->move(public_path()."/archivos",$carneConducir);
        }
        $contador = 0;
        if($dni_cliente ==""){
            Session::flash('ErrorCliente', "Debe seleccionar los archivos que se requieren...");
            $contador++;
        }
        if($renta == "") {
            Session::flash('ErrorRenta', "Debe seleccionar los archivos que se requieren...");
            $contador++;
        }
        if($carneConducir == "") {
            Session::flash('ErrorLicencia', "Debe seleccionar los archivos que se requieren...");
            $contador++;
        }
        if($contador != 0) {
            return back();
        } else {
            $reglas =[
                'bastidorCoche' => 'required|unique:ventas',//arreglar lo de la matricula y el bastidor para que no halla conflicto
                'estado'=>'required',
            ];
            $request->validate($reglas);
        }
        $venta = new Venta();
        $venta->fill($request->all());

        $venta->dni_cliente = $dni_cliente;
        $venta->id_cliente = $user->id;
        $venta->id_empleado = $empleado->id;
        $venta->fechaCompra = $fechaCompra = Carbon::now()->toDateTimeString();
        $venta->horaCompra = $horaCompra = Carbon::now()->toTimeString();
        $venta->renta = $renta;
        $venta->licenciaConducir = $carneConducir;

        $venta->save();

        /**********Asiganarle Matricula al coche vendido**********/

        $generarMatricula = new Controller();
        $asignarMatricula = Coche::findOrFail($request->idCoche);
        $asignarMatricula->matricula = $generarMatricula->generarMatricula();
        $asignarMatricula->save();

        /**********Asiganarle Matricula al coche vendido**********/

        /**********generar otro coche igual pero con distinto bastidor**********/

        $generarBastidor = new Controller();
        $cocheNuevo = new Coche();//   
        $cocheVendido = Coche::findOrFail($request->idCoche);//busco el coche que estoy vendiendo
        $cocheNuevo->numeroBastidor = $generarBastidor->generarBastidor();//llamo al metodo para genberar un nuevo bastidor
        $cocheNuevo->marca = $cocheVendido->marca;
        $cocheNuevo->modelo = $cocheVendido->modelo;
        $cocheNuevo->modelo = $cocheVendido->modelo;
        $cocheNuevo->precio = $cocheVendido->precio;
        $cocheNuevo->año = $cocheVendido->año;
        $cocheNuevo->detalle = $cocheVendido->detalle;
        $cocheNuevo->imagen = $cocheVendido->imagen;
        $cocheNuevo->save();//guardo el nuevo coche con distinto bastidor

        /**********generar otro coche igual pero con distinto bastidor**********/
        
        return view('pago.pago',[
            'venta' => $venta,
            'coche' => $cocheNuevo
        ]);
    }



    public function verVentas(){
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
        return view("venta.index",
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


    public function actualizarVenta($id) {
        $this->authorize('view', User::class, Venta::class);
        $venta = Venta::findOrFail($id);;
        $cliente = User::findOrFail($venta->id_cliente);
        $empleado = User::findOrFail($venta->id_empleado);
        $coches = Coche::all();
        $coche;
        foreach ($coches as $cocheBuscar) {
            if($venta->bastidorCoche === $cocheBuscar->numeroBastidor) {
                $coche = $cocheBuscar;
            }
        }
        // pdf($id);
        return view("venta.edit",
            [
                "venta"=>$venta,
                "cliente"=>$cliente,
                "empleado"=>$empleado,
                "coche"=>$coche
            ]);
    }
    public function confirmarCambio(Request $request) {
        //dd($request->all());
        $actualizarVenta = Venta::findOrFail($request->id);
        //dd($actualizarVenta);
        $actualizarVenta->estado = $request->estado;
        
        return back();
    }

    public function enviarEmailDeCompra($id) {
        // dd("Estamos enviando un PDF por correo");
        $venta = Venta::findOrFail($id);
        $user = User::findOrFail($venta->id_cliente);// busco el cliente que sale en la venta
        Mail::to($user->email)->send(new CompraCocheEmail($venta));// envío el correo al correo del cliente buscado
        return redirect('ventas');
    }
    public function solicitarPago($id) {
        //dd("solicitando pago");
        $venta = Venta::findOrFail($id);
        $user = User::findOrFail($venta->id_cliente);// busco el cliente que sale en la venta
        Mail::to($user->email)->send(new SolicitarPago($venta));// envío el correo al correo del cliente buscado
        return back();
    }
    public function verMiCompra($id) {
       $venta = Venta::findOrFail($id);;
        $cliente = User::findOrFail($venta->id_cliente);
        $empleado = User::findOrFail($venta->id_empleado);
        $coches = Coche::all();
        $coche;
        foreach ($coches as $cocheBuscar) {
            if($venta->bastidorCoche === $cocheBuscar->numeroBastidor) {
                $coche = $cocheBuscar;
            }
        }
        // pdf($id);
        return view("venta.show",
            [
                "venta"=>$venta,
                "cliente"=>$cliente,
                "empleado"=>$empleado,
                "coche"=>$coche
            ]);
    }
    /*
    Método para guardar el excel
    */
    public function export() {
        return Excel::download(new ExcelExport(), 'ventas.xlsx');
    }
}

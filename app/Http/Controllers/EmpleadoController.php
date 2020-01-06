<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Venta;
use Session;
use Auth;
use DB;

class EmpleadoController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth'); //aplicable a todos los métodos
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $this->authorize('view', User::class);
      $usuarios = User::all();
      $user = Auth::user(); // obtengo el usuario actualmente logueado
      //dd($usuarios);
      $empleados = [];
      $roles = Role::all();
      foreach ($usuarios as $usuario) {
	      foreach ($roles as $rol) {
	      	if ( $rol->id == $usuario->role_id && $rol->nombre == "Empleado") {
	      		array_push($empleados, $usuario);
	      	}
	      }
      }
      //dd($empleados);
      return view('empleado.index', 
        ['empleados' => $empleados,
        'roles' => $roles,
        'user' => $user]);
    }

    public function create()
    {
      $this->authorize('create', User::class);
      return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request->all());
      $reglas = [
        'dni' => 'required|unique:users',
        'nombre' => 'required|max:255|min:3',
        'apellido' => 'required|max:255|min:3',
        'direccion' => 'required|max:255|min:3',
        'email' => 'required|unique:users|max:255|email',
        'password' => 'required|max:255','confirmed',
        'confirmarContraseña'=>'required',
        'telefono' => 'required|numeric',
      ];
      $request->validate($reglas);
      if($request->password != $request->confirmarContraseña){//comprueba que las contraseñas sean iguales
        Session::flash('confirmarContraseña', "Las contraseñas no coinciden!!! Por favor introduzca datos correctos...");
        return back();
      }else {
        $empleado = new User();
        $empleado->fill($request->all());
        $empleado->password = bcrypt($empleado->password);
        $empleado->role_id = 2;
        $empleado->save();
        return redirect('/empleado');
      }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->authorize('view', User::class);
      $empleado = User::findOrFail($id);
      $roles = Role::all();
      return view('empleado.show', ["empleado"=>$empleado],['roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $this->authorize('update', User::class);
      $empleado = User::findOrFail($id);
      $roles = Role::all();
      return view("empleado.edit",["empleado"=>$empleado],['roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      //dd($request->all());
      $reglas = [
        'dni' => 'required|unique:users,dni,'.$request->id,
        'nombre' => 'required|max:255|min:3',
        'apellido' => 'required|max:255|min:3',
        'direccion' => 'required|max:255|min:3',
        //'email' => 'required|unique:users|max:255|email',
        'email' => 'required|email|unique:users,email,' .$request->id,
        'password' => 'required|max:255','confirmed',
        'confirmarContraseña'=>'required',
        'telefono' => 'required|numeric',
        'role_id' => 'required|numeric',
      ];
      if($request->password != $request->confirmarContraseña){//comprueba que las contraseñas sean iguales
        Session::flash('confirmarContraseña', "Las contraseñas no coinciden!!! Por favor introduzca datos correctos...");
        return back();
      }else {
        $request->validate($reglas);
        $empleado = User::findOrFail($id);
        $empleado->fill($request->all());
        $empleado->password = bcrypt($empleado->password);
        $empleado->save();

        return redirect('/empleado/' . $empleado->id);
      }
    }
    public function destroy($id)
    {
      $this->authorize('delete', User::class);
      //User::destroy($id);
      //return back();
      $empleVenta = DB::table('ventas')->where('id_empleado', $id)->first();
      if($empleVenta) {
        Session::flash('errorBorrarEmpleado', "El empleado no se puede borrar, tiene ventas pendientes...");
        return back();
      } else{
        User::destroy($id);
        return back();
      }
    }

    /*public function comprobarVentasPendientes(){
      dd("alo alo");
      $user = Auth::user();
      $ventas = Venta::all();
      $ventasPendiendes = [];
      foreach ($ventas as $venta) {
        if($venta->id_empleado == $user->id){
          array_push($ventasPendiendes,$venta);
        }
      }
      return view("venta.index",["ventas"=>$ventasPendiendes]);
    }*/
}
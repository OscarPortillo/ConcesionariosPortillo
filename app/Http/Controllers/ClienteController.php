<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;
use Auth;

class ClienteController extends Controller
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
      $user = Auth::user(); // obtengo el usuario actualmente logueado
      $usuarios = User::all();
      //dd($usuarios);
      $clientes = [];
      $roles = Role::all();
      foreach ($usuarios as $usuario) {
	      foreach ($roles as $rol) {
	      	if ( $rol->id == $usuario->role_id && $rol->nombre == "Cliente") {
	      		array_push($clientes, $usuario);
	      	}
	      }
      }
      //dd($clientes);
      return view('cliente.index', 
        ['clientes' => $clientes,
        'roles' => $roles,
        'user' => $user]);
    }
    public function create()
    {
      $this->authorize('create', User::class);
      return view('cliente.create');
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
        $cliente = new User();
        $cliente->fill($request->all());
        $cliente->password = bcrypt($cliente->password);
        $cliente->role_id = 3;
        $cliente->save();
        return redirect('/cliente');
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
      $cliente = User::findOrFail($id);
      $roles = Role::all();
      return view('cliente.show', ["cliente"=>$cliente],['roles' => $roles]);
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
      $cliente = User::findOrFail($id);
      $roles = Role::all();
      return view("cliente.edit",["cliente"=>$cliente],['roles'=>$roles]);
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
        'password' => 'required|max:255',
        'confirmarContraseña'=>'required',
        'telefono' => 'required|numeric',
        'role_id' => 'required|numeric',
      ];
      $request->validate($reglas);
      if($request->password != $request->confirmarContraseña){//comprueba que las contraseñas sean iguales
        Session::flash('confirmarContraseña', "Las contraseñas no coinciden!!! Por favor introduzca datos correctos...");
        return back();
      }else {        
        $cliente = User::findOrFail($id);
        $cliente->fill($request->all());
        $cliente->password = bcrypt($cliente->password);
        $cliente->save();
  
        return redirect('/cliente/' . $cliente->id);
       }      
    }
    public function destroy($id)
    {
      $this->authorize('delete', User::class);
      User::destroy($id);
      return back();
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Session;
use Auth;
use DB;

class UserController extends Controller
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
        $usuarios = User::paginate(10);
        $roles = Role::all();
        return view('user.index', 
                    ['usuarios' => $usuarios,
                    'roles' => $roles,
                    "user" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);
        return view('user.create');
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
            $user = new User();
            $user->fill($request->all());
            $user->password = bcrypt($user->password);
            $user->remember_token = $request->_token;
            $user->save();
        return redirect('/users');
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
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view('user.show', ["usuario"=>$usuario],['roles' => $roles]);
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
        $usuario = User::findOrFail($id);
        $roles = Role::all();
        return view("user.edit",["usuario"=>$usuario],['roles'=>$roles]);
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
        $this->authorize('update', User::class);
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
        } else {
            $request->validate($reglas);      
            $user = User::findOrFail($id);
            $user->fill($request->all());
            $user->password = bcrypt($user->password);
            $user->save();

            return redirect('/users/' . $user->id);
      }
    }
    public function destroy($id)
    {
        $this->authorize('delete', User::class);
        $user = User::findOrFail($id);
        //dd($user);
        if($user->role_id == 1){
            Session::flash('errorBorrarAdmin', "El administrador no se puede borrar...");
            return back();
        } else {
            $empleVenta = DB::table('ventas')->where('id_empleado', $id)->first();
            if($empleVenta) {
                Session::flash('errorBorrarEmpleado', "El empleado no se puede borrar, tiene ventas pendientes...");
                return back();
            } else{
                User::destroy($id);
                return back();
            }
        }
    }
  }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coche;
use Auth;

class CocheController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user(); // obtengo el usuario actualmente logueado
        $TodosLosCoches = Coche::all();
        $coches =[];
        foreach ($TodosLosCoches as $coche) {
            if($coche->matricula == null){
                array_push($coches, $coche);// Esto para separar los coches que están ya vendidos ( lo que ya tienen matricula asignada)
            }
        }
        return view('coche.index',
            [
                'coches'=>$coches,
                'user' => $user
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Coche::class);
        return view ('coche.create');
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
        //dd($this->generarBastidor());
        $reglas =[
                //'numeroBastidor' => 'required|unique:coches',
                'marca'=>'required|max:255|min:3',
                'imagen'=>'required',
                'modelo'=>'required|max:255|min:1',
                'precio'=>'required|numeric',
                'año'=>'required|min:2',
                'detalle'=>'required|min:10',
            ];
            $request->validate($reglas);
        if($request->hasFile("imagen")){
            $archivo = $request->file("imagen");
            //$nombre = time().$archivo->getClientOriginalName();
            $nombre = time().$request->marca.$request->modelo;
            $archivo->move(public_path()."/images",$nombre);

            ///////////////////////////////////
            
            $coche = new Coche();
            $bastidor = new Controller(); 
            $coche->fill($request->all());
            $coche->numeroBastidor =  $bastidor->generarBastidor();
            $coche->imagen =  $nombre;
            $coche->save();
            return redirect("/coche");
        } else {
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coche = Coche::findOrFail($id);
        return view("coche.show",["coche"=>$coche]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Coche::class);
        $coche = Coche::findOrFail($id);
        return view("coche.edit",
            [
                "coche"=>$coche
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->imagenVieja);
        $reglas =[
            //'matricula' =>'required|max:7|min:7',
            'numeroBastidor'=>'required|unique:coches,numeroBastidor,' .$request->id,
            'marca'=>'required|max:255|min:3',
            'modelo'=>'required|max:255|min:1',
            'precio'=>'required|numeric',
            'año'=>'required|min:2',
            'detalle'=>'required|min:2'
        ];
        $request->validate($reglas);
        $nombre = "";
        if($request->hasFile("imagen")){
            $archivo = $request->file("imagen");
            $nombre = time().$request->marca.$request->modelo;
            $archivo->move(public_path()."/images",$nombre);
        }
        //dd($nombre);
        
        $coche = Coche::findOrFail($id);
        $coche->fill($request->all());
        if ( $nombre == "") {
            //dd("no se ha pasado imagen nueva, se procede a meter la vieja");
            $coche->imagen= $request->imagenVieja;
        } else {
            //dd("no se ha pasado imagen nueva, se procede a reemplazar la vieja");
            $coche->imagen =  $nombre;
        }
        $coche->save();
        return redirect("/coche/$id");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function borrarCoche($id)
    {
        $this->authorize('delete', Coche::class);
        Coche::destroy($id);
        return back();
    }
    public function comprar($id)
    {
        dd("ahh pvrro quieres comprarte una nave.!!!!");
    }


    
}

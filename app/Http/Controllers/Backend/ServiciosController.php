<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Categorias;
use App\Servicios;

class ServiciosController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $servicios =  Servicios::all(); 
     
         return view('Backend.servicio.index', ['servicios'=> $servicios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('Backend.servicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Servicios::where('posicion', $request->posicion)->get();
        $Servicios =  Servicios::all();
        $serviciocreate =  new Servicios;
    
        $archivo_nombre =Str::slug($request->nombre, '-');
    	  $archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
        $serviciocreate->nombre = $request->nombre;
        $serviciocreate->categorias_id = $request->categorias_id;
        $serviciocreate->texto = $request->texto;
        $serviciocreate->posicion = $request->posicion;
        
        if ($request->hasFile('imagen')) {
            $img = Storage::putFileAs('public/servicio/imagenes', new File($request->imagen), $archivo_nombre.'.'.$request->imagen->getClientOriginalExtension());
            $serviciocreate->imagen = $img;
        }
        $serviciocreate->publico = isset($request->publico) ? 1 : 0;
       
        if(count($existe)){
            foreach ($Servicios as $servicio) {
                if( $servicio->posicion == $request->posicion){
                    $this->editPosicion($servicio->id);
                }
                
            }
           
           
        }
        else {
            if(count($Servicios) < $request->posicion)
            $serviciocreate->posicion = count($Servicios)+1;
        }
       
        $serviciocreate->save();

        $update=Servicios::find($serviciocreate->id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($serviciocreate->id);
        return redirect()->route('admin.servicio.index');

    }

    public function editPosicion($id)
    {
        $Servicios =  Servicios::find($id);
        $Servicios->posicion = $Servicios->posicion+1;
        $Servicios->save();

    }

    
    public function validateRepetido($id)
    {
        $all =  Servicios::all();
        foreach ($all as $item) {
            if(count(Servicios::where('posicion', $item->posicion)->get()) == 2){
                if($item->id != $id){
                $servicio =  Servicios::find($item->id);
                 $servicio->posicion = $servicio->posicion+1;
                    }    
                $servicio->save();
            }
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
        $servicio =  Servicios::find($id);
        return view('Backend.servicio.show', ['servicio'=> $servicio]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicio =  Servicios::find($id);
        return view('Backend.servicio.edit', ['servicio'=> $servicio]);
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
        $Servicios =  Servicios::all();
        $serviciocreate = Servicios::find($id);
        $idCompare= Servicios::where('posicion',$request->posicion)->get();
        $flag_posicion= $serviciocreate->posicion;
        $archivo_nombre =Str::slug($request->titulo, '-');
      	$archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
        $serviciocreate->titulo = $request->titulo;
        $serviciocreate->texto = $request->texto;
        $serviciocreate->posicion = $request->posicion;
        if ($request->hasFile('imagen')) {
            $img = Storage::putFileAs('public/servicio/imagenes', new File($request->imagen), $archivo_nombre.'.'.$request->imagen->getClientOriginalExtension());
            $serviciocreate->imagen = $img;
        }
        $serviciocreate->publico = isset($request->publico) ? 1 : 0;
        if(count($Servicios) < $request->posicion)
        $serviciocreate->posicion = count($Servicios)+1;
        $serviciocreate->save();
   
        $Servicios =  Servicios::all();
        if( $flag_posicion < $request->posicion  ){
                $update=Servicios::find($idCompare[0]->id);
                $update->posicion =$request->posicion-2;
                $update->save();
                
                
        }
            foreach ($Servicios as $servicio) {
                    if(  $servicio->posicion ==  $serviciocreate->posicion){
                        $this->editToUpdatePosicion($servicio->id);   
                        } 
                    }
                            
            

       
        $update=Servicios::find($id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($id);
        return redirect()->route('admin.servicio.index');

    }

    public function editToUpdatePosicion($id)
    {
        $Servicios =  Servicios::find($id);
        $Servicios->posicion =  $Servicios->posicion+1;
        $Servicios->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicio =  Servicios::find($id);
        $Servicios =  Servicios::all();
        foreach ($Servicios as $item) {
            if(  $item->posicion >= $servicio->posicion )
               { 
                $update = Servicios::find($item->id);
                $update->posicion =  $update->posicion-1;
                $update->save();
                }
            }
            $servicio->delete();
        return redirect()->route('admin.servicio.index');
    }
}

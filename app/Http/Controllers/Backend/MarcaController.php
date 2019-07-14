<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Marcas;

class MarcaController extends Controller
{
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $marcas =  Marcas::all(); 
     
         return view('Backend.marca.index', ['marcas'=> $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Marcas::where('posicion', $request->posicion)->get();
        $Marcas =  Marcas::all();
        $marcaCreate =  new Marcas;
        $marcaCreate->titulo = $request->titulo;
        $marcaCreate->posicion = $request->posicion;
        $marcaCreate->publico = isset($request->publico) ? 1 : 0;
        $archivo_nombre =Str::slug($request->titulo, '-');
        $archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
         
        if ($request->hasFile('imagen')) {
            $img = Storage::putFileAs('public/marcas', new File($request->imagen), $archivo_nombre.'.'.$request->imagen->getClientOriginalExtension());
            $marcaCreate->imagen = $img;
        }
        if(count($existe)){
            foreach ($Marcas as $marca) {
                if( $marca->posicion == $request->posicion){
                    $this->editPosicion($marca->id);
                }
                
            }
           
           
        }
        else {
            if(count($Marcas) < $request->posicion)
            $marcaCreate->posicion = count($Marcas)+1;
        }
       
        $marcaCreate->save();

        $update=Marcas::find($marcaCreate->id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($marcaCreate->id);
        return redirect()->route('admin.marca.index');

    }

    public function editPosicion($id)
    {
        $Marcas =  Marcas::find($id);
        $Marcas->posicion = $Marcas->posicion+1;
        $Marcas->save();

    }

    
    public function validateRepetido($id)
    {
        $all =  Marcas::all();
        foreach ($all as $item) {
            if(count(Marcas::where('posicion', $item->posicion)->get()) == 2){
                if($item->id != $id){
                $marca =  Marcas::find($item->id);
                 $marca->posicion = $marca->posicion+1;
                    }    
                $marca->save();
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
        $marca =  Marcas::find($id);
        return view('Backend.marca.show', ['marca'=> $marca]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marca =  Marcas::find($id);
        return view('Backend.marca.edit', ['marca'=> $marca]);
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
        $Marcas =  Marcas::all();
        $marcaCreate = Marcas::find($id);
        $idCompare= Marcas::where('posicion',$request->posicion)->get();
        $flag_posicion= $marcaCreate->posicion;
        
        $marcaCreate->titulo = $request->titulo;

        $marcaCreate->posicion = $request->posicion;
        
        $marcaCreate->publico = isset($request->publico) ? 1 : 0;
        if(count($Marcas) < $request->posicion)
        $marcaCreate->posicion = count($Marcas)+1;
        $archivo_nombre =Str::slug($request->titulo, '-');
        $archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
         
        if ($request->hasFile('imagen')) {
            $img = Storage::putFileAs('public/slider/imagenes', new File($request->imagen), $archivo_nombre.'.'.$request->imagen->getClientOriginalExtension());
            $marcaCreate->imagen = $img;
        }
        $marcaCreate->save();
   
        $Marcas =  Marcas::all();
        if( $flag_posicion < $request->posicion  ){
                $update=Marcas::find($idCompare[0]->id);
                $update->posicion =$request->posicion-2;
                $update->save();
                
                
        }
            foreach ($Marcas as $marca) {
                    if(  $marca->posicion ==  $marcaCreate->posicion){
                        $this->editToUpdatePosicion($marca->id);   
                        } 
                    }
                            
            

       
        $update=Marcas::find($id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($id);
        return redirect()->route('admin.marca.index');

    }

    public function editToUpdatePosicion($id)
    {
        $Marcas =  Marcas::find($id);
        $Marcas->posicion =  $Marcas->posicion+1;
        $Marcas->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca =  Marcas::find($id);
        $Marcas =  Marcas::all();
        foreach ($Marcas as $item) {
            if(  $item->posicion >= $marca->posicion )
               { 
                $update = Marcas::find($item->id);
                $update->posicion =  $update->posicion-1;
                $update->save();
                }
            }
        $marca->delete();
        return redirect()->route('admin.marca.index');
    }
}

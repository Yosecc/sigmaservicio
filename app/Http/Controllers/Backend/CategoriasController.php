<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Categorias;

class CategoriasController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categorias =  Categorias::all(); 
     
         return view('Backend.categoria.index', ['categorias'=> $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Categorias::where('posicion', $request->posicion)->get();
        $Categorias =  Categorias::all();
        $categoriaCreate =  new Categorias;
        $categoriaCreate->titulo = $request->titulo;
        $categoriaCreate->posicion = $request->posicion;
        $categoriaCreate->publico = isset($request->publico) ? 1 : 0;
       
        if(count($existe)){
            foreach ($Categorias as $categoria) {
                if( $categoria->posicion == $request->posicion){
                    $this->editPosicion($categoria->id);
                }
                
            }
           
           
        }
        else {
            if(count($Categorias) < $request->posicion)
            $categoriaCreate->posicion = count($Categorias)+1;
        }
       
        $categoriaCreate->save();

        $update=Categorias::find($categoriaCreate->id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($categoriaCreate->id);
        return redirect()->route('admin.categoria.index');

    }

    public function editPosicion($id)
    {
        $Categorias =  Categorias::find($id);
        $Categorias->posicion = $Categorias->posicion+1;
        $Categorias->save();

    }

    
    public function validateRepetido($id)
    {
        $all =  Categorias::all();
        foreach ($all as $item) {
            if(count(Categorias::where('posicion', $item->posicion)->get()) == 2){
                if($item->id != $id){
                $categoria =  Categorias::find($item->id);
                 $categoria->posicion = $categoria->posicion+1;
                    }    
                $categoria->save();
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
        $categoria =  Categorias::find($id);
        return view('Backend.categoria.show', ['categoria'=> $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria =  Categorias::find($id);
        return view('Backend.categoria.edit', ['categoria'=> $categoria]);
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
        $Categorias =  Categorias::all();
        $categoriaCreate = Categorias::find($id);
        $idCompare= Categorias::where('posicion',$request->posicion)->get();
        $flag_posicion= $categoriaCreate->posicion;
        
        $categoriaCreate->titulo = $request->titulo;

        $categoriaCreate->posicion = $request->posicion;
        
        $categoriaCreate->publico = isset($request->publico) ? 1 : 0;
        if(count($Categorias) < $request->posicion)
        $categoriaCreate->posicion = count($Categorias)+1;
        $categoriaCreate->save();
   
        $Categorias =  Categorias::all();
        if( $flag_posicion < $request->posicion  ){
                $update=Categorias::find($idCompare[0]->id);
                $update->posicion =$request->posicion-2;
                $update->save();
                
                
        }
            foreach ($Categorias as $categoria) {
                    if(  $categoria->posicion ==  $categoriaCreate->posicion){
                        $this->editToUpdatePosicion($categoria->id);   
                        } 
                    }
                            
            

       
        $update=Categorias::find($id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($id);
        return redirect()->route('admin.categoria.index');

    }

    public function editToUpdatePosicion($id)
    {
        $Categorias =  Categorias::find($id);
        $Categorias->posicion =  $Categorias->posicion+1;
        $Categorias->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria =  Categorias::find($id);
        $categorias =  Categorias::all();
        foreach ($categorias as $item) {
            if(  $item->posicion >= $categoria->posicion )
               { 
                $update = Categorias::find($item->id);
                $update->posicion =  $update->posicion-1;
                $update->save();
                }
            }
        $categoria->delete();
        return redirect()->route('admin.categoria.index');
    }
}

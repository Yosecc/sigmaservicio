<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Sliders;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sliders =  Sliders::all(); 
     
         return view('Backend.slider.index', ['sliders'=> $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existe = Sliders::where('posicion', $request->posicion)->get();
        $sliders =  Sliders::all();
        $slidercreate =  new Sliders;
    
        $archivo_nombre =Str::slug($request->titulo, '-');
    	$archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
        $slidercreate->titulo = $request->titulo;
        $slidercreate->texto = $request->texto;
        $slidercreate->posicion = $request->posicion;
        
        if ($request->hasFile('imagen')) {
            $img = Storage::putFileAs('public/slider/imagenes', new File($request->imagen), $archivo_nombre.'.'.$request->imagen->getClientOriginalExtension());
            $slidercreate->imagen = $img;
        }
        $slidercreate->publico = isset($request->publico) ? 1 : 0;
       
        if(count($existe)){
            foreach ($sliders as $slider) {
                if( $slider->posicion == $request->posicion){
                    $this->editPosicion($slider->id);
                }
                
            }
           
           
        }
        else {
            if(count($sliders) < $request->posicion)
            $slidercreate->posicion = count($sliders)+1;
        }
       
        $slidercreate->save();

        $update=Sliders::find($slidercreate->id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($slidercreate->id);
        return redirect()->route('admin.slider.index');

    }

    public function editPosicion($id)
    {
        $sliders =  Sliders::find($id);
        $sliders->posicion = $sliders->posicion+1;
        $sliders->save();

    }

    
    public function validateRepetido($id)
    {
        $all =  Sliders::all();
        foreach ($all as $item) {
            if(count(Sliders::where('posicion', $item->posicion)->get()) == 2){
                if($item->id != $id){
                $slider =  Sliders::find($item->id);
                 $slider->posicion = $slider->posicion+1;
                    }    
                $slider->save();
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
        $slider =  Sliders::find($id);
        return view('Backend.slider.show', ['slider'=> $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider =  Sliders::find($id);
        return view('Backend.slider.edit', ['slider'=> $slider]);
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
        $sliders =  Sliders::all();
        $slidercreate = Sliders::find($id);
        $idCompare= Sliders::where('posicion',$request->posicion)->get();
        $flag_posicion= $slidercreate->posicion;
        $archivo_nombre =Str::slug($request->titulo, '-');
    	$archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
        $slidercreate->titulo = $request->titulo;
        $slidercreate->texto = $request->texto;
        $slidercreate->posicion = $request->posicion;
        if ($request->hasFile('imagen')) {
            $img = Storage::putFileAs('public/slider/imagenes', new File($request->imagen), $archivo_nombre.'.'.$request->imagen->getClientOriginalExtension());
            $slidercreate->imagen = $img;
        }
        $slidercreate->publico = isset($request->publico) ? 1 : 0;
        if(count($sliders) < $request->posicion)
        $slidercreate->posicion = count($sliders)+1;
        $slidercreate->save();
   
        $sliders =  Sliders::all();
        if( $flag_posicion < $request->posicion  ){
                $update=Sliders::find($idCompare[0]->id);
                $update->posicion =$request->posicion-2;
                $update->save();
                
                
        }
            foreach ($sliders as $slider) {
                    if(  $slider->posicion ==  $slidercreate->posicion){
                        $this->editToUpdatePosicion($slider->id);   
                        } 
                    }
                            
            

       
        $update=Sliders::find($id);
        $update->posicion =$request->posicion;
        $update->save();
        $this->validateRepetido($id);
        return redirect()->route('admin.slider.index');

    }

    public function editToUpdatePosicion($id)
    {
        $sliders =  Sliders::find($id);
        $sliders->posicion =  $sliders->posicion+1;
        $sliders->save();

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider =  Sliders::find($id);
        $sliders =  Sliders::all();
        foreach ($sliders as $item) {
            if(  $item->posicion >= $slider->posicion )
               { 
                $update = Sliders::find($item->id);
                $update->posicion =  $update->posicion-1;
                $update->save();
                }
            }
            $slider->delete();
        return redirect()->route('admin.slider.index');
    }
}

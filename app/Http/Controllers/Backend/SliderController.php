<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Slider as Slider;
use App\Servicios as Servicios;


class SliderController extends Controller
{
      public function create(Request $request)
    {
      //dd($request->all()); 
      $titulo= $request["titulo"];
      $contenido= $request["contenido"];
      if($request["publico"]){
          $publico= "1";
      }
      else {
        $publico = "0";
      }
      $posiciones_registradas = Slider::select('id','posicion')
                                        ->where('posicion',$request["posicion"])
                                      ->first();
      if ($posiciones_registradas) {
        $posiciones_registradas = Slider::select('id','posicion')
                                        ->get();
        foreach ($posiciones_registradas as $valor) {
            if($valor->posicion > $request["posicion"]-1){
              Slider::where('id',$valor->id)
                    ->update(['posicion'=>$valor->posicion+1]);
            }
        }

      }
      $sliders = new Slider;
      $sliders->fill($request->input());
      $sliders->publico=$publico;
      $sliders->role_user_id = Auth::id();
      $nombreArchivo = "img_slider";
      $archivo_img = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
              $path = public_path().'/images/sliders/';
              $request["url_imagen"]->move($path, $archivo_img);
      $sliders->url_imagen=$archivo_img;
      $sliders->save();

      return redirect()->route("versliders");

    }
    public function list()
    {
         $sliders = DB::table('sliders')
                        ->select(DB::raw('id,titulo,  IF (publico = "1", "Si", "No") as publico, posicion,  created_at'))
                        ->orderBy('posicion')
                        ->get();

         return view('Backend.slider',['sliders'=>$sliders]);
    }
    public function onesearch($id)
    {
        $slider = DB::table('sliders')
                  ->where('id', $id)
                  ->first();

        if (!$slider){
          return view('Backend.index');
        }
        else{
          $posiciones_registradas = Slider::select('posicion')
                                          ->orderBy('posicion')
                                          ->get();
          foreach ($posiciones_registradas as $key => $value) {
            $posiciones_disponibles[$key]=$value->posicion;
          }
          $slider = DB::table('sliders')
                         ->select(DB::raw('id, titulo, publico,contenido, contenido2, posicion, url_imagen,  created_at'))
                         ->where('id', $id)
                         ->first();

          return view('Backend.form.formsliderupdate',['slider'=>$slider,'posiciones_disponibles'=>$posiciones_disponibles]);
        }

    }
    public function update(Request $request, $id)
    {
      // dd($request);
      $slider = DB::table('sliders')
                ->where('id', $id)
                ->first();

      if (!$slider){
        return view('Backend.index');
      }
      else{
        $id_posicion = Slider::select('id','posicion')
                                          ->where('id',$id)
                                        ->first();
        if ($id_posicion->posicion!=$request["posicion"]) {
          $posiciones_registradas = Slider::select('id','posicion')
                                          ->get();
          foreach ($posiciones_registradas as $valor) {
              if($valor->posicion != $id_posicion->posicion){
                if ($valor->posicion <= $request["posicion"] && $valor->posicion > $id_posicion->posicion) {
                  Slider::where('id',$valor->id)
                        ->update(['posicion'=>$valor->posicion-1]);
                }
                else {
                  if($valor->posicion >= $request["posicion"] && $valor->posicion < $id_posicion->posicion){
                    Slider::where('id',$valor->id)
                          ->update(['posicion'=>$valor->posicion+1]);
                  }
                }

              }
          }

        }
            $slider = Slider::find($id)
                      ->fill($request->input());
            if($request->hasFile('url_imagen')){
              $nombreArchivo = "img_slider";
              $archivo_img = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
                      $path = public_path().'/images/sliders/';
                      $request["url_imagen"]->move($path, $archivo_img);
              $slider->url_imagen = $archivo_img;
            }
            if($request["publico"]){
                $slider->publico= "1";
            }
            else {
              $slider->publico = "0";
            }
            $slider->role_user_id = Auth::id();
            $slider->save()
            ;
          return redirect()->route("versliders");
       }
    }
    public function delete($id)
    {
        DB::table('sliders')->where('id', $id)->delete();

        return redirect()->route("versliders");
    }
    public function form()
    {
      $posiciones_registradas = Slider::select('posicion')
                                      ->orderBy('posicion')
                                      ->get();
      foreach ($posiciones_registradas as $key => $value) {
        $posiciones_disponibles[$key]=$value->posicion;
      }
      $posiciones_disponibles[count($posiciones_registradas)]=count($posiciones_registradas)+1;


        return view('Backend.form.formslider',['posiciones_disponibles'=>$posiciones_disponibles]);
    }


}

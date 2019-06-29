<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Tours;


class ServiciosController extends Controller
{
  public function index(){
    $tours = Tours::orderBy('posicion', 'DESC')->get();
    return view('Backend.servicios.index', compact('tours'));
  }
  public function store(Request $request){
      //dd($request->all());
      
      $orden = Tours::where('posicion', $request->posicion)->first();

      if ($orden) {
        $orden = Tours::all();
        foreach ($orden as $value) {
          if ($value->posicion > $request->posicion - 1) {
            $actualiza = Tours::where('id', $value->id)->update(['posicion'=>$value->id+1]);
          }
        }
      }

      $guardar = new Tours;
      $guardar->nombre   = $request->titulo;
      $guardar->descripcion   = $request->descripcion;
      $guardar->fechaDesde   = $request->fechaDesde;
      $guardar->fechaHasta   = $request->fechaHasta;
      $guardar->horarioDesde   = $request->horarioDesde;
      $guardar->horarioHasta   = $request->horarioHasta;
      $guardar->sitio   = $request->sitio;
      if($request->hasFile('url_imagen')){
        $nombreArchivo = "img_tour";
        $archivo_img = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
                $path = public_path().'/images/servicios/';
                $request["url_imagen"]->move($path, $archivo_img);
        $guardar->img = $archivo_img;
      }
      $guardar->estado = $request->estado;
      $guardar->posicion = $request->posicion;
      $guardar->user = Auth::id();
      $guardar->save();



      if (count($guardar) == 1) {
        $mensaje = 'Registro guardado';
      }
    return redirect()->route('servicios.index')->with('mensaje', $mensaje);

  }
  public function create(){

    $posicion = Tours::orderBy('posicion','desc')->get();
    
    return view('Backend.servicios.create', compact('posicion'));
  }

  public function edit(Request $request ){
    $tour = Tours::where('id', $request['id'])->first();
    $posicion = Tours::orderBy('posicion','desc')->get();
    
    return view('Backend.servicios.edit', compact('posicion','tour'));
  }

  public function update(Request $request){
    $orden = Tours::where('posicion', $request->posicion)->first();

      if ($orden) {
        $orden = Tours::all();
        foreach ($orden as $value) {
          if ($value->posicion > $request->posicion - 1) {
            $actualiza = Tours::where('id', $value->id)->update(['posicion'=>$value->id+1]);
          }
        }
      }

      if($request->hasFile('url_imagen')){
        $nombreArchivo = "img_tour";
        $archivo_img = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
                $path = public_path().'/images/servicios/';
                $request["url_imagen"]->move($path, $archivo_img);

        $actualizaIMG = Tours::where('id', $request->id)->update(['img'=>$archivo_img,]);

                                                             
                                                            
                                                            
      }

    $actualiza = Tours::where('id', $request->id)->update([ 'nombre'=>$request->titulo,
                                                            'descripcion'=>$request->descripcion,
                                                            'fechaDesde'=>$request->fechaDesde,
                                                            'fechaHasta'=>$request->fechaHasta,
                                                            'horarioDesde'=>$request->horarioDesde,
                                                            'horarioHasta'=>$request->horarioHasta,
                                                            'sitio'=>$request->sitio,
                                                            'estado'=>$request->estado,
                                                            'posicion'=>$request->posicion,
                                                            'user'=>Auth::id()]);

     if ($actualiza) {
        $mensaje = 'Registro Actualizado';
      }
    return redirect()->route('servicios.index')->with('mensaje', $mensaje);

  }

  public function destroy(Request $request){
    $delete = Tours::where('id',$request->id )->delete();
    
    if ($delete) {
        $mensaje = 'Registro Eliminado';
      }
    return redirect()->route('servicios.index')->with('mensaje', $mensaje);
  }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Secciones as Secciones;
use App\Campos as Campos;
use App\SeccionesCampos as SeccionesCampos;

class SeccionesController extends Controller
{
  public function form()
  {
    $cantidad_campos="";
    $campos = Campos::get();
    $secciones = Secciones::orderBy('updated_at','desc')
                  ->get();


      foreach ($secciones as $key=>  $seccion) {
        $secciones_campos = SeccionesCampos::where('seccion_id',$seccion->id)
                               ->get();
        $cantidad_campos[$seccion->id] = count($secciones_campos);
      }


      return view('Backend.form.formseccion',['campos'=>$campos,'secciones'=>$secciones,'cantidad_campos'=>$cantidad_campos]);
  }
  public function delete($id)
  {
      SeccionesCampos::where('seccion_id', $id)->delete();
      Secciones::where('id', $id)->delete();
      return redirect()->route("formseccion");
  }
  public function create(Request $request)
  {
    $seccion = new Secciones();
    $seccion->fill($request->input());
    $seccion->role_user_id = Auth::id();
    $seccion->save();

    $posiciones=array();
    $posiciones=$request["posicion_campo"];
    $indice_posiciones=0;
    foreach ($posiciones as $value) {
      if(!empty($value)){
      $posiciones[$indice_posiciones]=$value;
      $indice_posiciones++;
      }
    }

    $campos=array();
    $campos=$request["campo_id"];
      foreach($campos as $key=> $campo){
          $seccion_campo = new SeccionesCampos();
          $seccion_campo->posicion_campo = $posiciones[$key];
          $seccion_campo->campo_id = $campo;
          $seccion_campo->seccion_id = $seccion->id;
          $seccion_campo->role_user_id = Auth::id();
          $seccion_campo->save();
          }
    return redirect()->route("formseccion");
  }
  public function onesearch($id)
  {
      $seccion = Secciones::where('id', $id)
                ->first();

      if (!$seccion){
        return view('Backend.index');
      }
      else{
        $seccion = Secciones::where('id', $id)
                       ->first();
        $secciones_campos = SeccionesCampos::where('seccion_id', $id)
                            ->get();
        foreach ($secciones_campos as $key => $s_c) {
          $seccion_campo[$s_c->campo_id]["campo_id"]=$s_c->campo_id;
          $seccion_campo[$s_c->campo_id]["posicion_campo"]=$s_c->posicion_campo;
        }
        $campos = Campos::get();
        foreach ($campos as $campo) {
          if(isset($seccion_campo[$campo->id]["campo_id"])){
            $campo_id[$campo->id]['campo_id']=$campo->id;
            $campo_id[$campo->id]['nombre_campo']=$campo->nombre_campo;
            $campo_id[$campo->id]['posicion_campo']=$seccion_campo[$campo->id]["posicion_campo"];
            $campo_id[$campo->id]['registrado']=1;
          }
          else{
            $campo_id[$campo->id]['campo_id']=$campo->id;
            $campo_id[$campo->id]['nombre_campo']=$campo->nombre_campo;
            $campo_id[$campo->id]['registrado']=0;
          }
        }
        return view('Backend.form.formseccionupdate',['seccion'=>$seccion,'campo_id'=>$campo_id]);
      }

  }
  public function update(Request $request, $id)
  {
    // dd($request);
    $seccion = Secciones::where('id', $id)
              ->first();

    if (!$seccion){
      return view('Backend.index');
    }
    else{

          $seccion = Secciones::find($id)
                    ->fill($request->input());
          $seccion->role_user_id = Auth::id();
          $seccion->save();

          $posiciones=array();
          $posiciones=$request["posicion_campo"];
          $indice_posiciones=0;
          foreach ($posiciones as $value) {
            if(!empty($value)){
            $posiciones[$indice_posiciones]=$value;
            $indice_posiciones++;
            }
          }

          $campos_id= $request["campo_id"];
          $seccion_campo = SeccionesCampos::where('seccion_id', $seccion->id)
                                      ->whereNotIn('campo_id',$campos_id)
                                      ->get();

          foreach ($seccion_campo as $para_borrar) {
            $borrar= SeccionesCampos::where('seccion_id', $seccion->id)
                                        ->where('campo_id',$para_borrar->campo_id)
                                        ->delete();
          }
          foreach ($campos_id as $para_guardar) {
            $buscar_campos = SeccionesCampos::where('seccion_id', $seccion->id)
                                        ->where('campo_id',$para_guardar)
                                        ->first();

            if (!$buscar_campos){
              $seccion_campo = new SeccionesCampos();
              $seccion_campo->campo_id = $para_guardar;
              $seccion_campo->posicion_campo = $posiciones[$key];
              $seccion_campo->seccion_id = $seccion->id;
              $seccion_campo->role_user_id = Auth::id();
              $seccion_campo->save();
            }

          }

        return redirect()->route("formseccion");
     }
  }
}

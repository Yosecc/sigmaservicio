<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Noticias as Noticias;

class NoticiasController extends Controller
{
      public function create(Request $request)
    {
     // dd($request->all());
      if($request["publico"]){
          $publico= "1";
      }
      else {
        $publico = "0";
      }
      $posiciones_registradas = Noticias::select('id','posicion')
                                        ->where('posicion',$request["posicion"])
                                      ->first();
      if ($posiciones_registradas) {
        $posiciones_registradas = Noticias::select('id','posicion')
                                        ->get();
        foreach ($posiciones_registradas as $valor) {
            if($valor->posicion > $request["posicion"]-1){
              Noticias::where('id',$valor->id)
                    ->update(['posicion'=>$valor->posicion+1]);
            }
        }

      }
      $noticia = new Noticias;
      $noticia->fill($request->input());
      $noticia->publico=$publico;
      $noticia->role_user_id = Auth::id();
      if($request["url_multimedia"]){
        $noticia->url_multimedia=$request["url_multimedia"];
      }
      else {
        $nombreArchivo = "img_noticia";
        $archivo_img = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
                $path = public_path().'/images/noticias/';
                $request["url_imagen"]->move($path, $archivo_img);
        $noticia->url_imagen=$archivo_img;
      }
      $noticia->save();
      // dd($request);



      return redirect()->route("vernoticias");
    }
    public function list()
    {
         $noticia = DB::table('noticias')
                        ->select(DB::raw('id, titulo,  IF (publico = "1", "Si", "No") as publico, posicion,  updated_at'))
                        ->orderBy('noticias.posicion')
                        ->get();

         return view('Backend.noticias',['noticias'=>$noticia]);
    }
    public function onesearch($id)
    {
      $posiciones_registradas = Noticias::select('posicion')
                                      ->orderBy('posicion')
                                      ->get();
      foreach ($posiciones_registradas as $key => $value) {
        $posiciones_disponibles[$key]=$value->posicion;
      }

        $noticia = Noticias::where('id', $id)
                  ->first();

        if (!$noticia){
          return view('Backend.index');
        }
        else{
          $noticia = Noticias::select(DB::raw('id, titulo, IF (publico = "1", "checked", "") as publico, fuente, resumen, descripcion, posicion,url_multimedia, url_imagen,  created_at'))
                         ->where('id', $id)
                         ->first();
          return view('Backend.form.formnoticiaupdate',['noticia'=>$noticia,'posiciones_disponibles'=>$posiciones_disponibles]);
        }

    }
    public function update(Request $request, $id)
    {
      $noticia = DB::table('noticias')
                ->where('id', $id)
                ->first();

      if (!$noticia){
        return view('Backend.index');
      }
      else{
        $id_posicion = Noticias::select('id','posicion')
                                          ->where('id',$id)
                                        ->first();
        if ($id_posicion->posicion!=$request["posicion"]) {
          $posiciones_registradas = Noticias::select('id','posicion')
                                          ->get();
          foreach ($posiciones_registradas as $valor) {
              if($valor->posicion != $id_posicion->posicion){
                if ($valor->posicion <= $request["posicion"] && $valor->posicion > $id_posicion->posicion) {
                  Noticias::where('id',$valor->id)
                        ->update(['posicion'=>$valor->posicion-1]);
                }
                else {
                  if($valor->posicion >= $request["posicion"] && $valor->posicion < $id_posicion->posicion){
                    Noticias::where('id',$valor->id)
                          ->update(['posicion'=>$valor->posicion+1]);
                  }
                }

              }
          }

        }
            $noticia = Noticias::find($id)
                        ->fill($request->input());
            if($request->hasFile('url_imagen')){
              $nombreArchivo = "img_noticia";
              $name_fileoption1 = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
                      $path = public_path().'/images/noticias/';
                      $request["url_imagen"]->move($path, $name_fileoption1);
              $noticia->url_imagen=$name_fileoption1;
            }
            else{
              if($request->filled("url_multimedia")){
                  $noticia->url_multimedia=$request["url_multimedia"];
              }
            }
            if($request["publico"]){
                $noticia->publico= "1";
            }
            else {
              $noticia->publico = "0";
            }
            $noticia->role_user_id = Auth::id();
            $noticia->save();
          return redirect()->route("vernoticias");
       }
    }
    public function delete($id)
    {
        DB::table('noticias')->where('id', $id)->delete();

        return redirect()->route("vernoticias");
    }
    public function form()
    {
      $posiciones_registradas = Noticias::select('posicion')
                                      ->orderBy('posicion')
                                      ->get();
      foreach ($posiciones_registradas as $key => $value) {
        $posiciones_disponibles[$key]=$value->posicion;
      }
      $posiciones_disponibles[count($posiciones_registradas)]=count($posiciones_registradas)+1;
        return view('Backend.form.formnoticia',['posiciones_disponibles'=>$posiciones_disponibles]);
    }
}

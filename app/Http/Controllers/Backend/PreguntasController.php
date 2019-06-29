<?php

namespace App\Http\Controllers\Backend;

use App\Preguntas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Preguntas::select(DB::raw('id, pregunta, respuesta, IF (publico = "1", "Si", "No") as publico, posicion_pregunta,  updated_at'))
        ->orderBy('posicion_pregunta')
        ->get();

return view('Backend.preguntas',['preguntas'=>$preguntas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posiciones_registradas = Preguntas::select('posicion_pregunta')
                                      ->orderBy('posicion_pregunta')
                                      ->get();
      foreach ($posiciones_registradas as $key => $value) {
        $posiciones_disponibles[$key]=$value->posicion_pregunta;
      }
      $posiciones_disponibles[count($posiciones_registradas)]=count($posiciones_registradas)+1;


      
    return view('Backend.form.formpregunta',['posiciones_disponibles'=>$posiciones_disponibles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request["publico"]){
            $publico= "1";
        }
        else {
          $publico = "0";
        }
        $posiciones_registradas = Preguntas::select('id','posicion_pregunta')
                                          ->where('posicion_pregunta',$request["posicion_pregunta"])
                                        ->first();
        if ($posiciones_registradas) {
          $posiciones_registradas = Preguntas::select('id','posicion_pregunta')
                                          ->get();
          foreach ($posiciones_registradas as $valor) {
              if($valor->posicion_pregunta > $request["posicion_pregunta"]-1){
                Preguntas::where('id',$valor->id)
                      ->update(['posicion_pregunta'=>$valor->posicion_pregunta+1]);
              }
          }
  
        }
        $preguntas = new Preguntas;
        $preguntas->fill($request->input());
        $preguntas->publico = $publico;        
        $preguntas->role_user_id = Auth::id();        
        $preguntas->save();
        return redirect()->route("verpreguntas");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function show(Preguntas $preguntas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function edit(Preguntas $preguntas)
    {
        $pregunta = Preguntas::select(DB::raw('id, pregunta, IF (publico = "1", "checked", "") as publico, respuesta, posicion_pregunta, updated_at'))
        ->where('id', $preguntas->id)
        ->first();

        if (!$pregunta){
        return view('Backend.index');
        }
        else{      
        $posiciones_registradas = Preguntas::select('posicion_pregunta')
                                        ->orderBy('posicion_pregunta')
                                        ->get();
        foreach ($posiciones_registradas as $key => $value) {
        $posiciones_disponibles[$key]=$value->posicion_pregunta;
        }          
        return view('Backend.form.formpreguntaupdate',['pregunta'=>$pregunta,'posiciones_disponibles'=>$posiciones_disponibles]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preguntas $preguntas)
    {
        $pregunta = Preguntas::where('id', $preguntas->id)
        ->first();

        if (!$pregunta){
        return view('Backend.index');
        }
        else{
        $id_posicion = Preguntas::select('id','posicion_pregunta')
                                        ->where('id',$preguntas->id)
                                        ->first();
        if ($id_posicion->posicion_pregunta!=$request["posicion_pregunta"]) {
        $posiciones_registradas = Preguntas::select('id','posicion_pregunta')
                                        ->get();
        foreach ($posiciones_registradas as $valor) {
            if($valor->posicion_pregunta != $id_posicion->posicion_pregunta){
                if ($valor->posicion_pregunta <= $request["posicion_pregunta"] && $valor->posicion_pregunta > $id_posicion->posicion_pregunta) {
                    Preguntas::where('id',$valor->id)
                        ->update(['posicion_pregunta'=>$valor->posicion_pregunta-1]);
                }
                else {
                if($valor->posicion_pregunta >= $request["posicion_pregunta"] && $valor->posicion_pregunta < $id_posicion->posicion_pregunta){
                    Preguntas::where('id',$valor->id)
                        ->update(['posicion_pregunta'=>$valor->posicion_pregunta+1]);
                }
                }

            }
        }

        }
            $pregunta = Preguntas::find($preguntas->id)
                    ->fill($request->input());
            if($request["publico"]){
                $pregunta->publico= "1";
            }
            else {
            $pregunta->publico = "0";
            }
            $pregunta->role_user_id = Auth::id();
            $pregunta->save()
            ;
        return redirect()->route("verpreguntas");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preguntas  $preguntas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preguntas $preguntas)
    {
        
        Preguntas::where('id', $preguntas->id)->delete();

        return redirect()->route("verpreguntas");
    }
}

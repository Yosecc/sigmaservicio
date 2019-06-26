public function list()
  {
       $servicios = DB::table('servicios')
                      ->join('categorias', 'categorias.id', '=', 'servicios.categoria_id')
                      ->join('formatos', 'formatos.servicio_id', '=', 'servicios.id')
                      ->distinct()
                      ->select('titulo_servicio','monto','nombre_categoria','servicios.created_at','servicios.id','servicios.updated_at')
                      ->orderBy('servicios.updated_at','desc')
                      ->get();
       return view('Backend.servicios',['servicios'=>$servicios]);
  }
  public function listuno(Request $request)
  {
    $id = $request['id_categoria'];
       $servicios = Servicios::where('categoria_id',$id)
                        ->orderBy('titulo_servicio')
                      ->get();
       return $servicios;
  }
  public function form()
  {
    $categorias = Categorias::pluck('nombre_categoria','categorias.id as categoria_id');
    $secciones = Secciones::distinct()->get();
      return view('Backend.form.formservicio',['secciones'=>$secciones,'categorias'=>$categorias]);
  }
  public function onesearch($id)
  {
      $servicio = Servicios::where('id', $id)
                ->first();
      if (!$servicio){
        return view('Backend.index');
      }
      else{

        $categorias= Categorias::pluck('nombre_categoria','categorias.id as categoria_id');
        $secciones=Secciones::get();
        $formatos=Formatos::where('servicio_id', $servicio->id)
                               ->get();
        foreach ($formatos as $key => $formato) {
            $secciones_formatos[$formato->seccion_id]["seccion_id"]=$formato->seccion_id;
            $secciones_formatos[$formato->seccion_id]["posicion_seccion"]=$formato->posicion_seccion;
        }
        foreach ($secciones as $key => $seccion) {
          if(isset($secciones_formatos[$seccion->id]["seccion_id"])){
            $seccion_id[$seccion->id]["seccion_id"]=$seccion->id;
            $seccion_id[$seccion->id]["nombre_seccion"]=$seccion->nombre_seccion;
            $seccion_id[$seccion->id]["posicion_seccion"]=$secciones_formatos[$seccion->id]["posicion_seccion"];
            $seccion_id[$seccion->id]["registrado"]=1;
          }
          else {
            $seccion_id[$seccion->id]["seccion_id"]=$seccion->id;
            $seccion_id[$seccion->id]["nombre_seccion"]=$seccion->nombre_seccion;
            $seccion_id[$seccion->id]["registrado"]=0;
          }
        }
        return view('Backend.form.formservicioupdate',['servicio'=>$servicio,'categorias'=>$categorias,'seccion_id'=>$seccion_id,'formatos'=>$formatos]);
      }

  }
  public function delete($id)
  {
      DB::table('formatos')->where('servicio_id', $id)->delete();
      DB::table('servicios')->where('id', $id)->delete();

      return redirect()->route("verservicios");
  }
  public function create(Request $request)
  {
    // dd($request);
    $servicio = new Servicios();
    $servicio->fill($request->input());
    if($request->hasFile('url_imagen')){
      $nombreArchivo = "img_servicios";
      $archivo_img = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
              $path = public_path().'/images/servicios/';
              $request["url_imagen"]->move($path, $archivo_img);
      $servicio->url_imagen = $archivo_img;
    }
    $servicio->role_user_id = Auth::id();
    $servicio->save();

    $posiciones=array();
    $posiciones=$request["posicion_seccion"];
    $indice_posiciones=0;
    foreach ($posiciones as $value) {
      if(!empty($value)){
      $posiciones[$indice_posiciones]=$value;
      $indice_posiciones++;
      }
    }

    $secciones=array();
    $secciones=$request["seccion_id"];
    if(count($secciones)>1){
      foreach($secciones as $key=> $seccion){

              $formato = new Formatos();
              $formato->posicion_seccion = $posiciones[$key];
              $formato->seccion_id = $seccion;
              $formato->role_user_id = Auth::id();
              $formato->servicio_id = $servicio->id;
              $formato->save();
            }
    }
    else{
        $formato = new Formatos();
        $formato->seccion_id = $request["seccion_id"][0];
        $formato->posicion_seccion = $posiciones[0];
        $formato->role_user_id = Auth::id();
        $formato->servicio_id = $servicio->id;
        $formato->save();
    }
    return redirect()->route("verservicios");
  }
  public function update(Request $request, $id)
  {
    // dd($request);
    $servicio = Servicios::where('id', $id)
              ->first();

    if (!$servicio){
      return view('Backend.index');
    }
    else{

          $servicio = Servicios::find($id)
                    ->fill($request->input());
          if($request->hasFile('url_imagen')){
            $nombreArchivo = "img_servicios";
            $archivo_img = $nombreArchivo."_".time().'.'.$request["url_imagen"]->getClientOriginalExtension();
                    $path = public_path().'/images/servicios/';
                    $request["url_imagen"]->move($path, $archivo_img);
            $servicio->url_imagen = $archivo_img;
          }
          $servicio->role_user_id = Auth::id();
          $servicio->save();

          $posiciones=array();
          $posiciones=$request["posicion_seccion"];
          $indice_posiciones=0;
          foreach ($posiciones as $value) {
            if(!empty($value)){
            $posiciones[$indice_posiciones]=$value;
            $indice_posiciones++;
            }
          }
          $seccion_id= $request["seccion_id"];
          $formato_seccion = Formatos::where('servicio_id', $servicio->id)
                                      ->whereNotIn('seccion_id',$seccion_id)
                                      ->get();

          foreach ($formato_seccion as $para_borrar) {
            $borrar= Formatos::where('servicio_id', $servicio->id)
                                        ->where('seccion_id',$para_borrar->seccion_id)
                                        ->delete();
          }
          foreach ($seccion_id as $key=>$para_guardar) {
            $buscar_secciones = Formatos::where('servicio_id', $servicio->id)
                                        ->where('seccion_id',$para_guardar)
                                        ->first();

            if (!$buscar_secciones){
              $formato_seccion = new Formatos();
              $formato_seccion->posicion_seccion = $posiciones[$key];
              $formato_seccion->seccion_id = $para_guardar;
              $formato_seccion->servicio_id = $servicio->id;
              $formato_seccion->role_user_id = Auth::id();
              $formato_seccion->save();
            }

          }

        return redirect()->route("verservicios");
     }
  }
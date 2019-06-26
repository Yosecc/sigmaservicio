<?php

namespace App\Http\Controllers\Backend;

use App\Solicitud;
use App\Solicitantes;
use App\Categorias;
use App\Servicios;
use App\Secciones;
use App\Formatos;
use App\SeccionesCampos;
use App\Campos;
use App\TiposCampos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Solicitudes;
use App\Paises;
use App\Tours;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $solicitudes = Solicitudes::join('paises', 'solicitudes.pais','=','paises.iso')
                                    ->join('tours','solicitudes.id_tour', '=', 'tours.id')
                                    ->select('solicitudes.*','tours.nombre as tour', 'paises.nombre as pais')
                                    ->get();
                                    //dd($solicitudes);

        return view ('Backend.solicitudes.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $solicitantes= Solicitantes::join('campos', 'campos.id', '=', 'solicitantes.id_campo')
                            ->get();                          
        foreach ($solicitantes as $key => $value) {
            $solicitantesdatos[$value["id_solicitante"]]["id_solicitante"]=$value["id_solicitante"];          
            switch ($value["id_campo"]) {
                case 3:
                $solicitantesdatos[$value["id_solicitante"]]["nombres"]=$value["valor"];
                    break;
                case 17:
                $solicitantesdatos[$value["id_solicitante"]]["tel_cel"]=$value["valor"];
                    break;
                case 18:
                $solicitantesdatos[$value["id_solicitante"]]["tel_home"]=$value["valor"];
                    break;
                case 19:
                $solicitantesdatos[$value["id_solicitante"]]["correo"]=$value["valor"];
                    break;
                
                default:
                    # code...
                    break;
            }      
        }                
        foreach ($solicitantesdatos as $key => $solicitantedato) {
            
            
            $tramites= Solicitud::select('id_servicio','titulo_servicio','id_campo','nombre_campo','valor','status','solicitud.created_at')
                            ->join('servicios', 'servicios.id', '=', 'solicitud.id_servicio')
                            ->join('campos', 'campos.id', '=', 'solicitud.id_campo')
                            ->where('id_solicitante',$key)
                            ->get();
            
            foreach ($tramites as $key2 => $value) {
                switch ($value["status"]) {
                    case NULL:
                        $status="atender";
                        break;
                    case 1:
                        $status="proceso";
                        break;
                    case 2:
                        $status="finalizada";
                        break;
                    case 3:
                        $status="rechazada";
                        break;
                    default:
                        # code...
                        break;
                }
                switch ($value["id_campo"]) {
                    case 22:                        
                        $solicitantesdatos[$key]["servicios"]=$value["titulo_servicio"];
                        $solicitantesdatos[$key]["status"]=$status;
                        $solicitantesdatos[$key]["fecha"]=$value["created_at"];
                        $solicitantesdatos[$key]["tipo_tramite"]=$value["nombre_campo"];
                        $solicitantesdatos[$key]["id_servicio"]=$value["id_servicio"];
                        break;
                    case 23:
                        $solicitantesdatos[$key]["servicios"]=$value["titulo_servicio"];
                        $solicitantesdatos[$key]["status"]=$status;
                        $solicitantesdatos[$key]["fecha"]=$value["created_at"];
                        $solicitantesdatos[$key]["tipo_tramite"]=$value["nombre_campo"];
                        $solicitantesdatos[$key]["id_servicio"]=$value["id_servicio"];
                        break;
                    case 24:
                        $solicitantesdatos[$key]["servicios"]=$value["titulo_servicio"];
                        $solicitantesdatos[$key]["status"]=$status;
                        $solicitantesdatos[$key]["fecha"]=$value["created_at"];
                        $solicitantesdatos[$key]["tipo_tramite"]=$value["nombre_campo"];
                        $solicitantesdatos[$key]["id_servicio"]=$value["id_servicio"];
                        break;
                    
                    default:
                        # code...
                        break;
                }
            }                
        }           
              
        return view('Backend.tramites',['solicitantesdatos'=>$solicitantesdatos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *@param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit($id_servicio,$id_solicitante)
    {
        
        $solicitante= Solicitantes::where('id_solicitante', $id_solicitante)->get();
        $tramite= Solicitud::where('id_servicio', $id_servicio)->where('id_solicitante', $id_solicitante)->get();
        $servicio = Servicios::join('formatos', 'formatos.servicio_id', '=', 'servicios.id')
        ->where('servicios.id', $id_servicio)
        ->get();
        
        foreach ($servicio as $key => $value) {
            if($value->seccion_id==3){
                $secciones_campos= SeccionesCampos::join('secciones', 'secciones.id', '=', 'secciones_campos.seccion_id')
                                                    ->join('campos', 'campos.id', '=', 'secciones_campos.campo_id')
                                                    ->join('tipos_campos', 'tipos_campos.id', '=', 'campos.tipo_campo_id')
                                                    ->where('seccion_id',$value->seccion_id)->get();
                foreach ($secciones_campos as $key3 => $value3) {    
                    foreach ($solicitante as $key2 => $value2) {
                        if($value2->id_campo==$value3->campo_id){
                            $formato_ver[$key][$key3]["id_solicitante"]=$id_solicitante;
                            $formato_ver[$key][$key3]["nombre_servicio"]=$value->titulo_servicio;
                            $formato_ver[$key][$key3]["id_servicio"]=$value->id;
                            $formato_ver[$key][$key3]["nombre_seccion"]=$value3->nombre_seccion;
                            $formato_ver[$key][$key3]["id_seccion"]=$value->seccion_id;
                            $formato_ver[$key][$key3]["nombre_campo"]=$value3->nombre_campo;
                            $formato_ver[$key][$key3]["id_campo"]=$value3->campo_id;
                            $formato_ver[$key][$key3]["tipo_campo"]=$value3->name;                            
                            $formato_ver[$key][$key3]["valor"]=$value2->valor;
                            $formato_ver[$key][$key3]["status"]="";
                        }
                    }
                }
            }
            else{
                $secciones_campos= SeccionesCampos::join('secciones', 'secciones.id', '=', 'secciones_campos.seccion_id')
                                                    ->join('campos', 'campos.id', '=', 'secciones_campos.campo_id')
                                                    ->join('tipos_campos', 'tipos_campos.id', '=', 'campos.tipo_campo_id')
                                                    ->where('seccion_id',$value->seccion_id)->get();
                foreach ($secciones_campos as $key3 => $value3) {                  
                    foreach ($tramite as $key2 => $value2) {
                        if($value2->id_campo==$value3->campo_id){                            
                            $formato_ver[$key][$key3]["id_solicitante"]=$id_solicitante;
                            $formato_ver[$key][$key3]["nombre_servicio"]=$value->titulo_servicio;
                            $formato_ver[$key][$key3]["id_servicio"]=$value->id;
                            $formato_ver[$key][$key3]["nombre_seccion"]=$value3->nombre_seccion;
                            $formato_ver[$key][$key3]["id_seccion"]=$value->seccion_id;
                            $formato_ver[$key][$key3]["nombre_campo"]=$value3->nombre_campo;
                            $formato_ver[$key][$key3]["id_campo"]=$value3->campo_id; 
                            $formato_ver[$key][$key3]["tipo_campo"]=$value3->name;                          
                            $formato_ver[$key][$key3]["valor"]=$value2->valor;
                            $formato_ver[$key][$key3]["status"]=$value2->status;
                        }
                    }
                }
            }           
        }      
        $status = collect([
            ['status' => 1, 'name' => 'En Proceso'],
            ['status' => 2, 'name' => 'Finalizada'],
            ['status' => 3, 'name' => 'Rechazada'],
        ]);  
        if ($formato_ver[1][0]["status"]==1) {
            $status = collect([                
                ['status' => 2, 'name' => 'Finalizada'],
                ['status' => 3, 'name' => 'Rechazada'],
            ]);
        }
        
        $status_select = $status->pluck('name','status');           
        return view('Backend.form.formtramite',['formato_ver'=>$formato_ver,'status'=>$status_select]);     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update($id_servicio,$id_solicitante,Request $request)
    {
        $tramite = Solicitud::where('id_servicio', $id_servicio)
                ->where('id_solicitante', $id_solicitante)
                ->get();
        if (!$tramite){
        return view('Backend.index');
        }
        else{

          $tramite = Solicitud::where('id_servicio', $id_servicio)
                        ->where('id_solicitante', $id_solicitante)          
                        ->update(['status'=>$request->status]);
          ;
        return redirect()->route("vertramites");
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}

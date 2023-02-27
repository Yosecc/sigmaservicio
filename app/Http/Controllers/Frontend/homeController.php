<?php

namespace App\Http\Controllers\Frontend;

use DB;
use Mail;
use App\Marcas;
use App\Sliders;
use App\Servicios;
use App\Categorias;
use App\Comentarios;
use App\Mail\jefeContacto;
use App\Mail\userContacto;
use Illuminate\Http\Request;
use App\Mail\cotizacionContacto;
use App\Mail\ReclamosSugerencias;
use App\Http\Controllers\Controller;

class homeController extends Controller{

    public function index(){   

    	$slider = Sliders::where('publico',1)->orderBy('posicion','asc')->get();
    	$categorias = Categorias::where('publico',1)->orderBy('posicion','asc')->get();
      
    	$servicios =Servicios::where('publico',1)->orderBy('posicion','asc')->get();
    	$comentarios = Comentarios::all();
    	$marcas = Marcas::where('publico',1)->orderBy('posicion','asc')->get();

      return view('Frontend.index',compact('slider','categorias','comentarios','marcas','servicios'));
    }

    public function form_contacto(Request $request){
    	//dd($request->all());
    	 $validatedData = $request->validate([
					        'nombre' => 'required|max:255',
					        'telefono' => 'required|digits_between:8,12',
							'email' => 'required|email',
							'mensaje' => 'required',
					    ]);


    	  $this->send_email($request->nombre_empresa,$request->telefono,$request->email,$request->mensaje);
        return response()->json(['servicio' => $request->mensaje]);

    }

    public function form_cotizacion(Request $request){

         $validatedData = $request->validate([
                            'nombre_empresa' => 'required|max:255',
                            'telefono' => 'required|digits_between:8,12',
                            'email' => 'required|email',
                            'servicio' => 'required',
                        ]);


         $servicio = Servicios::where('id',$request->servicio)->first();

         $servicio = $servicio->nombre;
           // $correo_jefe='yosec.cervino@gmail.com';

          // $correo_jefe='sigmapanamaventas@gmail.com';

          $correo_jefe='ventas@sigmaservicio.com';
          Mail::to($correo_jefe)->send(new cotizacionContacto($request->nombre_empresa,$request->telefono,$request->email,$servicio));
          Mail::to($request->email)->send(new userContacto($request->nombre_empresa,$request->telefono,$request->email,$servicio));
          return response()->json(['servicio' => $servicio]);

    }


    public function sugerenciasReclamos(Request $request)
    {

      $validatedData = $request->validate([
        'nombre' => 'required|max:255',
        'telefono' => 'required|digits_between:8,12',
        'email' => 'required|email',
        'mensaje' => 'required',
      ]);

      // dd($request->all());
      //sugerencias@sigmaservicio.com
      $correo_jefe='sugerencias@sigmaservicio.com';
      Mail::to($correo_jefe)->send(new ReclamosSugerencias($request->all()));

    }

    private function send_email($nombre,$telefono,$email,$servicio){
        //sigmapanamaventas@gmail.com
        $correo_jefe='ventas@sigmaservicio.com';
        Mail::to($email)->send(new userContacto($nombre,$email,$telefono,$servicio));
        Mail::to($correo_jefe)->send(new jefeContacto($nombre,$email,$telefono,$servicio));
        
        return;
    }
  
  	public function servicio_ajax($id){
      //dd($id);
  		$servicio = Servicios::where('id', $id)->first();
     //dd($servicio);
  		return response()->json(['servicio' => $servicio]);
  	}
}

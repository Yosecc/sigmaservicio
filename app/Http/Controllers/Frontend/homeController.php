<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sliders;
use App\Servicios;
use App\Categorias;
use App\Comentarios;
use App\Marcas;
use DB;
use Mail;
use App\Mail\userContacto;
use App\Mail\jefeContacto;
use App\Mail\cotizacionContacto;

class homeController extends Controller{

    public function index(){   

    	$slider = Sliders::where('publico',1)->orderBy('posicion','asc')->get();
    	$categorias = Categorias::where('publico',1)->orderBy('posicion','asc')->get();
    	//$servicios =Servicios::
    	$comentarios = Comentarios::all();
    	$marcas = Marcas::where('publico',1)->orderBy('posicion','asc')->get();


        return view('Frontend.index',compact('slider','categorias','comentarios','marcas'));
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
          $correo_jefe='yosec.cervino@gmail.com';
          Mail::to($correo_jefe)->send(new cotizacionContacto($request->nombre_empresa,$request->telefono,$request->email,$servicio));
          Mail::to($request->email)->send(new userContacto($request->nombre_empresa,$request->telefono,$request->email,$servicio));
          return response()->json(['servicio' => $servicio]);

    }

    private function send_email($nombre,$telefono,$email,$servicio){
        //sigmapanamaventas@gmail.com
        $correo_jefe='yosec.cervino@gmail.com';
        Mail::to($email)->send(new userContacto($nombre,$email,$telefono,$servicio));
        Mail::to($correo_jefe)->send(new jefeContacto($nombre,$email,$telefono,$servicio));
        
        return ;

    
    }
  
  	public function servicio_ajax(Request $request){

      dd($request->all());

  		$servicio = Servicios::where('id', $request->id)->first();
  		return response()->json(['servicio' => $servicio]);
  	}
}

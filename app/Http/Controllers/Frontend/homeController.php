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
					        'nombre_empresa' => 'required|max:255',
					        'telefono' => 'required|digits_between:8,12',
							'email' => 'required|email',
							'servicio' => 'required',
					    ]);
    	 $servicio = Servicios::where('id',$request->servicio)->first();

    	 $servicio = $servicio->nombre;

    	 $this->send_email($request->nombre_empresa,$request->telefono,$request->email,$servicio);

    }

    private function send_email($nombre,$telefono,$email,$servicio){
        //ventas@securebyte.com.ve
        $correo_jefe='yosec.cervino@gmail.com';

    
        Mail::to($email)->send(new userContacto($nombre,$email,$telefono,$message));
        Mail::to($correo_jefe)->send(new jefeContacto($nombre,$email,$telefono,$servicio));
        
        return ;

    
    }
  
  	public function servicio_ajax(Request $request){


  		$servicio = Servicios::where('id', $request->id)->first();
  		return response()->json(['servicio' => $servicio]);
  	}
}

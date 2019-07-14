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

class homeController extends Controller{

    public function index(){   

    	$slider = Sliders::where('publico',1)->orderBy('posicion','asc')->get();
    	$categorias = Categorias::where('publico',1)->orderBy('posicion','asc')->get();
    	//$servicios =Servicios::
    	$comentarios = Comentarios::all();
    	$marcas = Marcas::where('publico',1)->orderBy('posicion','asc')->get();


        return view('Frontend.index',compact('slider','categorias','comentarios','marcas'));
    }

  
}

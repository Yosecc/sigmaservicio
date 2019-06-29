<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Contacto;
use Mail;

class AjaxMail extends Controller
{
    public function contactoController(Request $request){

    	//dd($request->all());

    	$request->validate([
		    'mail' => 'required|email',
		    'name' => 'required',
		    'mensaje' => 'required',
		]);

    	$name 	 =$request['name'];
    	$mail	 =$request['mail'];
    	$mensaje =$request['mensaje'];

    	Mail::to('info@consuljuridica.com')->send(new Contacto());

        return 1;

    }
}

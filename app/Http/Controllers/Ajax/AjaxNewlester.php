<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Newlester;

class AjaxNewlester extends Controller
{
    public function create(Request $request){


    	$request->validate([
		    'mail' => 'required|email|unique:newlesters',
		]);

		$mail = $request['mail'];

		
		$consulta = Newlester::where('mail', $mail)->first();

		$conteo = count($consulta);

		if ($conteo > 0) {
			$data = 0;
		}else{
			$createNewlester = new Newlester;
    		$createNewlester->mail = $mail;
    		$createNewlester->save();

    		$data = 1;
		}

    	return $data;

    }

    public function consulta(Request $request){


    }
}

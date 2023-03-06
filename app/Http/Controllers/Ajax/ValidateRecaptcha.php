<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidateRecaptcha extends Controller
{
    public function validates(Request $request)
    {
        $post = [
            'secret' => 'Your Secret key',
            'response' => $_REQUEST['g-recaptcha-response'],
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);

        curl_close ($ch);
        echo '<pre>'; print_r($server_output); die('ss');
    }
}

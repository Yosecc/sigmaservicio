<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class homeController extends Controller
{
    public function index(){

      return view('Backend.index');
    }
    public function modulos($name){

      switch ($name) {
        case 'register':
        return view('auth.register');
          break;

        default:
          // code...
          break;
      }

    }
}

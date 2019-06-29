<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class homeController extends Controller{

    public function index(){                      

        return view('Frontend.index');
    }

  
}

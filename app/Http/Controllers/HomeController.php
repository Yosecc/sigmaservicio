<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
      {
          if ($request->user()->hasRole('certificados') && !$request->user()->hasRole('admin')) {
              return redirect()->route('certificados.index');
          }

          $request->user()->authorizeRoles(['user', 'admin']);
          // return view('home');
          //redirecciona cuando inicia sesión al panel administrativo
          return view('Backend.index');
      }
}

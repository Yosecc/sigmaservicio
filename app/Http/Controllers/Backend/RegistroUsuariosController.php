<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Modelos
use App\Registro as RegistroUsuario;
use App\Paises;

class RegistroUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        // $usuarios = RegistroUsuario::Pais()->Seleccion()
        //     ->orderBy('registro.created_at', 'desc')           
        //     ->paginate(6);       

        // return $usuarios = RegistroUsuario::with('pais')->get();
        $usuarios = RegistroUsuario::with('pais:id,desc')
            ->orderBy('registro.created_at', 'desc')           
            ->paginate(6);

        // return Paises::with('usuarios')->get();
        // return Paises::with('usuarios:id')->has('usuarios')->get();
        // return RegistroUsuario::with('pais:id,desc')->has('pais')->get();

        return view('Backend.usuarios.registros.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

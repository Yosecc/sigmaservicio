<?php

namespace App\Http\Controllers\Backend\Configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comun;

class ConfigurarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.configuracion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $title = Comun::where('name', 'title')->update(['content'=>$request->title]);
        $telefono = Comun::where('name', 'telefono')->update(['content'=>$request->telefono]);
        $email = Comun::where('name', 'email')->update(['content'=>$request->email]);
        $direccion = Comun::where('name', 'direccion')->update(['content'=>$request->direccion]);
        $ubicacion = Comun::where('name', 'ubicacion')->update(['content'=>$request->ubicacion]);
        $video = Comun::where('name', 'video')->update(['content'=>$request->video]);
        $facebook = Comun::where('name', 'facebook')->update(['content'=>$request->facebook]);
        $twitter = Comun::where('name', 'twitter')->update(['content'=>$request->twitter]);
        $instagram = Comun::where('name', 'instagram')->update(['content'=>$request->instagram]);
        $descripcion = Comun::where('name','descripcion')->update(['content'=>$request->descripcion]);
        $meta_description = Comun::where('name', 'meta_description')->update(['content'=>$request->meta_description]);
        $meta_name = Comun::where('name', 'meta_name')->update(['content'=>$request->meta_name]);
        $meta_url = Comun::where('name', 'meta_url')->update(['content'=>$request->meta_url]);
        $politica_privacidad = Comun::where('name', 'politica_privacidad')->update(['content'=>$request->politica_privacidad]);
        $adress1 = Comun::where('name', 'adress1')->update(['content'=>$request->adress1]);
        $adress2 = Comun::where('name', 'adress2')->update(['content'=>$request->adress2]);

        return redirect()->route('configuracion.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
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

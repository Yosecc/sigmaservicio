<?php

namespace App\Http\Controllers\Backend\Parametros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Modelos
use App\TipoSubasta;
use App\Paises;

class SubastaController extends Controller
{
   public function index(Request $request)
    {
        $tiposSubasta = TipoSubasta::with(['pais:id,desc'])->orderBy('created_at', 'desc')->paginate(6);
        return view('Backend.parametrizar.subasta.index', compact('tiposSubasta'));
    }
    public function create(){
        $paises = Paises::all();
        return view("Backend.parametrizar.subasta.create", compact('paises'));
    }
    public function edit($id){
        $tipoSubasta = TipoSubasta::with(['pais:id,desc'])->findOrFail($id);
        $paises = Paises::all();
        return view("Backend.parametrizar.subasta.edit", compact('tipoSubasta','paises'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'descripcion' => 'required|string',
            'pais' => 'required|int',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);        
        $tipoSubasta = new TipoSubasta;
        $tipoSubasta->descripcion = $request->descripcion;
        $tipoSubasta->fecha_inicio = $request->fecha_inicio;
        $tipoSubasta->pais_id = $request->pais;
        $tipoSubasta->fecha_fin = $request->fecha_fin;
        $tipoSubasta->id_usuario = auth()->user()->id;
        $tipoSubasta->save();
        return redirect()->route('tipo_subastas.index');
    }
    public function update(Request $request, int $id)
    {
        // dd($request->all());
        $request->validate([
            'descripcion' => 'required|string',
            'pais' => 'required|int',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required'
        ]);
        $tipoSubasta = TipoSubasta::findOrFail($id);
        $tipoSubasta->descripcion = $request->descripcion;
        $tipoSubasta->fecha_inicio = $request->fecha_inicio;
        $tipoSubasta->pais_id = $request->pais;
        $tipoSubasta->fecha_fin = $request->fecha_fin;
        $tipoSubasta->id_usuario = auth()->user()->id;
        $tipoSubasta->save();
        return back();
    }
    public function destroy($id)
    {
        TipoSubasta::findOrFail($id)->delete($id);
        return back();
    }
}

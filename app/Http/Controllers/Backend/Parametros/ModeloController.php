<?php

namespace App\Http\Controllers\Backend\Parametros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Modelos
use App\Modelo;

class ModeloController extends Controller
{
   public function index(Request $request)
    {
        $modelos = Modelo::orderBy('created_at', 'desc')->paginate(6);
        return view('Backend.parametrizar.modelo.index', compact('modelos'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'descripcion' => 'required|string'
        ]);        
        $modelo = new Modelo;
        $modelo->descripcion = $request->descripcion;
        $modelo->id_usuario = auth()->user()->id;
        $modelo->save();
        return back();
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $modelo = Modelo::findOrFail($id);
        $modelo->descripcion = $request->descripcion;
        $modelo->save();
        return back();
    }
    public function destroy($id)
    {
        Modelo::find($id)->delete($id);
        return back();
    }
}

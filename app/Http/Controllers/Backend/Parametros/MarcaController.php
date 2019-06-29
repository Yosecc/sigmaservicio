<?php

namespace App\Http\Controllers\Backend\Parametros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Modelos
use App\Marca;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        $marcas = Marca::orderBy('descripcion', 'asc')->paginate(6);
        // return $marcas = Marca::orderBy('created_at', 'desc')->get();
        return view('Backend.parametrizar.marca.index', compact('marcas'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'descripcion' => 'required|string'
        ]);        
        $marca = new Marca;
        $marca->descripcion = $request->descripcion;
        $marca->id_usuario = auth()->user()->id;
        $marca->save();
        return back();
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $marca = Marca::findOrFail($id);
        $marca->descripcion = $request->descripcion;
        $marca->save();
        return back();
    }
    public function destroy($id)
    {
        Marca::find($id)->delete($id);
        return back();
    }
}

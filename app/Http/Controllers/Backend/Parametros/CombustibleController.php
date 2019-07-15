<?php

namespace App\Http\Controllers\Backend\Parametros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Modelos
use App\Combustible;

class CombustibleController extends Controller
{
  public function index(Request $request)
    {
        $combustibles = Combustible::orderBy('descripcion', 'asc')->paginate(6);
        // return $combustibles = Combustible::orderBy('created_at', 'desc')->get();
        return view('Backend.parametrizar.combustible.index', compact('combustibles'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'descripcion' => 'required|string'
        ]);        
        $marca = new Combustible;
        $marca->descripcion = $request->descripcion;
        $marca->id_usuario = auth()->user()->id;
        $marca->save();
        return back();
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $marca = Combustible::findOrFail($id);
        $marca->descripcion = $request->descripcion;
        $marca->save();
        return back();
    }
    public function destroy($id)
    {
        Combustible::find($id)->delete($id);
        return back();
    }
}

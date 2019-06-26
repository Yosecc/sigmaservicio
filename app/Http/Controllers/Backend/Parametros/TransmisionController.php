<?php

namespace App\Http\Controllers\Backend\Parametros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Modelos
use App\Transmision;

class TransmisionController extends Controller
{
   public function index(Request $request)
    {
        $transmisiones = Transmision::orderBy('created_at', 'desc')->paginate(6);
        return view('Backend.parametrizar.transmision.index', compact('transmisiones'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'descripcion' => 'required|string'
        ]);        
        $transmision = new Transmision;
        $transmision->descripcion = $request->descripcion;
        $transmision->id_usuario = auth()->user()->id;
        $transmision->save();
        return back();
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $transmision = Transmision::findOrFail($id);
        $transmision->descripcion = $request->descripcion;
        $transmision->save();
        return back();
    }
    public function destroy($id)
    {
        Transmision::find($id)->delete($id);
        return back();
    }
}

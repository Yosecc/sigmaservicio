<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;
use Illuminate\Support\Facades\Storage;
// Modelos
use App\Vehiculo;
use App\Tipo;
use App\Modelo;
use App\Marca;
use App\Transmision;
use App\Combustible;
use App\Paises;
use App\Dano;
use App\Galeria;
use App\TipoSubasta;

class VehiculoController extends Controller
{
 
    public function index(Request $request)
    {
        $vehiculos = Vehiculo::Relaciones()->orderBy('created_at')->paginate(6);
        return view('Backend.vehiculos.index', compact('vehiculos'));
    }
    
    public function create()
    {
        $tipos = Tipo::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $transmisiones = Transmision::all();
        $combustibles = Combustible::all();
        $paises = Paises::all();
        $tiposSubasta = TipoSubasta::with('pais:id,desc')->get();
        
        return view('Backend.vehiculos.create',compact('tipos','marcas','modelos','transmisiones','combustibles','paises', 'tiposSubasta'));
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        $request['id_usuario'] = auth()->id();
        $vehiculo = Vehiculo::create($request->all());
        $vehiculo->tiposSubasta()->sync($request->tipo_subasta);
        return back();        
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $vehiculo = Vehiculo::Relaciones()->findOrFail($id);
        $tipos = Tipo::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        $transmisiones = Transmision::all();
        $combustibles = Combustible::all();
        $paises = Paises::all();
        $tiposSubasta = TipoSubasta::with('pais:id,desc')->get();
        
        return view('Backend.vehiculos.edit',compact('vehiculo','tipos','marcas','modelos','transmisiones','combustibles','paises', 'tiposSubasta'));
    }
    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // $request['id_usuario'] = auth()->id();
        Vehiculo::findOrFail($id)->update($request->all());
        return back();
    }
    
    public function destroy($id)
    {
        Vehiculo::findOrFail($id)->delete();
        return back();
    }

    public function indexFotos($id){
        $vehiculo = Vehiculo::with('fotos')->findOrFail($id);
        return view('Backend.vehiculos.fotos.index', compact('vehiculo'));
    }

    public function createFotos($id){
        $vehiculo = Vehiculo::findOrFail($id);
        return view('Backend.vehiculos.fotos.create', compact('vehiculo'));
    }

    public function storeFotos(Request $request,$id){
        $file = $request->file('file');
        $path = public_path() . '/images/galeria/';
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path,$fileName); 

        $galeria = new Galeria;
        $galeria->id_vehiculo = $id; 
        $galeria->img = $fileName;
        $galeria->descripcion = $file->getClientOriginalName();
        $galeria->id_usuario = auth()->id();
        $galeria->save();

        return response()->json(["mensaje" => $request->file->getClientOriginalName()]);
    }

    public function destroyFoto($id){
        // Galeria::findOrFail($id)->delete();

        $foto = Galeria::findOrFail($id);
        if(file_exists(public_path('images/galeria/'.$foto->img))){
          unlink(public_path('images/galeria/'.$foto->img));         
        }
        $foto->delete(); 
        return back();
    }

    public function indexDanos(Request $request, $id){
        $vehiculo = Vehiculo::with('daño')->select('id')->findOrFail($id);
        return view('Backend.vehiculos.danos.index', compact('vehiculo'));
    }

    public function storeDanos(Request $request, $id){

        $request->validate([
            'pdf' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required'
        ]);
        // dd($request->all());

        if( Dano::where('id_vehiculo', $id)->count() > 0 ){
            $daño = Dano::where('id_vehiculo', $id)->first();
            if(file_exists(public_path('/archivos/daños/pdf/'.$daño->archivo))){
              unlink(public_path('/archivos/daños/pdf/'.$daño->archivo));         
            }
            if(file_exists(public_path('/archivos/daños/images/'.$daño->imagen))){
              unlink(public_path('/archivos/daños/images/'.$daño->imagen));         
            }
        }else{
            $daño = new Dano; 
        }
        $file = $request->file('pdf');
        $path = public_path() . '/archivos/daños/pdf/';
        $fileNamePDF = uniqid() . $file->getClientOriginalName();
        $file->move($path,$fileNamePDF); 

        $file = $request->file('imagen');
        $path = public_path() . '/archivos/daños/images/';
        $fileNameImage = uniqid() . $file->getClientOriginalName();
        $file->move($path,$fileNameImage);
             
        $daño->id_vehiculo = $id; 
        $daño->imagen = $fileNameImage;
        $daño->archivo = $fileNamePDF;
        $daño->descripcion = $request->descripcion;
        $daño->id_usuario = auth()->id();
        $daño->save();

        return back();
    }
}

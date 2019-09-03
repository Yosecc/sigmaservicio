<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Comentarios as Comentarios;

class ComentariosController extends Controller
{
  public function create(Request $request)
  {
    // dd($request);
    $comentario = new Comentarios();
    $comentario->fill($request->input());

    $archivo_nombre =Str::slug($request->nombre, '-');
    $archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
    
    if ($request->hasFile('url_imagen')) {
            $img = Storage::putFileAs('public/comentarios', new File($request->url_imagen), $archivo_nombre.'.'.$request->url_imagen->getClientOriginalExtension());
           $comentario->url_imagen = $img;
        }
    $comentario->role_user_id = Auth::id();
    $comentario->save();

    return redirect()->route("vercomentarios");
  }
  public function list()
  {
    $comentarios=Comentarios::orderBy('updated_at','desc')
                  ->get();
    return view('Backend.comentarios',['comentarios'=>$comentarios]);
  }
  public function delete($id)
  {
      $comentario = Comentarios::where('id', $id)->first();
      if(file_exists(public_path('images/comentarios/'.$comentario->url_imagen))){
        unlink(public_path('images/comentarios/'.$comentario->url_imagen));         
      }
      $comentario->delete();  
      return redirect()->route("vercomentarios");
  }
  public function form()
  {
      return view('Backend.form.formcomentario');
  }
  public function onesearch($id)
  {
      $comentario = Comentarios::where('id', $id)
                ->first();

      if (!$comentario){
        return view('Backend.index');
      }
      else{
        $comentario = Comentarios::where('id', $id)
                       ->first();
        return view('Backend.form.formcomentarioupdate',['comentario'=>$comentario]);
      }

  }
  public function update(Request $request, $id)
  {
    // dd($request);
    $comentario = Comentarios::where('id', $id)
                              ->first();

    if (!$comentario){
      return view('Backend.index');
    }
    else{

          $comentario = Comentarios::find($id)
                    ->fill($request->input());

           $archivo_nombre =Str::slug($request->nombre, '-');
            $archivo_nombre = $archivo_nombre.'-'.Carbon::now()->format('Ymd');
            
            if ($request->hasFile('url_imagen')) {
                    $img = Storage::putFileAs('public/comentarios', new File($request->url_imagen), $archivo_nombre.'.'.$request->url_imagen->getClientOriginalExtension());
                   $comentario->url_imagen = $img;
                }
          $comentario->role_user_id = Auth::id();
          $comentario->save()
          ;
        return redirect()->route("vercomentarios");
     }
  }
}

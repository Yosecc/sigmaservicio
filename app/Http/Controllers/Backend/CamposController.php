<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Campos as Campos;
use App\TiposCampos as TiposCampos;

class CamposController extends Controller
{
  public function form()
  {
    $tipos_campos = TiposCampos::pluck('tipo_campo','id as tipo_campo_id');
    $campos = DB::table('campos')
                   ->join('tipos_campos', 'tipos_campos.id', '=', 'campos.tipo_campo_id')
                   ->select('nombre_campo','tipo_campo','campos.id','campos.updated_at')
                   ->orderBy('campos.updated_at','desc')
                   ->get();
      return view('Backend.form.formcampo',['tipos_campos'=>$tipos_campos,'campos'=>$campos]);
  }
  public function create(Request $request)
  {
    $campo = new Campos();
    $campo->fill($request->input());
    $campo->role_user_id = Auth::id();
    $campo->save();

    return redirect()->route("formcampo");
  }
  public function onesearch($id)
  {
      $campo = Campos::where('id', $id)
                ->first();

      if (!$campo){
        return view('Backend.index');
      }
      else{
        $campo = Campos::where('id', $id)
                       ->first();
        $tipos_campos = TiposCampos::pluck('tipo_campo','id as tipo_campo_id');
        return view('Backend.form.formcampoupdate',['campo'=>$campo,'tipos_campos'=>$tipos_campos]);
      }

  }
  public function delete($id)
  {
      DB::table('campos')->where('id', $id)->delete();
      return redirect()->route("formcampo");
  }
  public function update(Request $request, $id)
  {
    // dd($request);
    $campo = Campos::where('id', $id)
                  ->first();
    if (!$campo){
      return view('Backend.index');
    }
    else{

          $campo = Campos::find($id)
                    ->fill($request->input());
          $campo->role_user_id = Auth::id();
          $campo->save()
          ;
        return redirect()->route("formcampo");
     }
  }
}

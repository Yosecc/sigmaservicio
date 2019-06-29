<?php

namespace App\Http\Controllers\Backend;

use App\Categorias;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categorias::orderBy('updated_at','desc')
        ->get();
        return view('Backend.form.formcategoria',['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categorias();
        $categoria->fill($request->input());        
        $categoria->save();
    
        return redirect()->route("formcategoria");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categorias)
    {
        $categoria = Categorias::where('id', $categorias->id)
                ->first();

      if (!$categoria){
        return view('Backend.index');
      }
      else{
        return view('Backend.form.formcategoriaupdate',['categoria'=>$categoria]);
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categorias)
    {
        $categoria = Categorias::where('id', $categorias->id)->first();
        if (!$categoria){
            return view('Backend.index');
        }
        else{
            $categoria = Categorias::find($categorias->id)
                    ->fill($request->input());       
            $categoria->save();
            return redirect()->route("formcategoria");
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        Categorias::where('id', $categorias->id)->delete();
        return redirect()->route("formcategoria");
    }
}

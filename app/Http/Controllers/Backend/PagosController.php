<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Modelos
use App\Pagos;

class PagosController extends Controller
{
    public function index()
    {
        $pagos = Pagos::with(['registro.pais:id,desc','formaPago:id,descripcion','vehiculo'])
            ->orderBy('id', 'desc')->paginate(6);
        return view('Backend.pagos.index', compact('pagos'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}

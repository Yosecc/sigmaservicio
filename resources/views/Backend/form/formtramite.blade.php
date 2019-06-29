@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="tramites" hidden disabled>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
        <h4 class="card-title">{{$formato_ver[0][0]["nombre_servicio"]}}</h4>
          <p class="card-category">Verificar todos los datos</p>          
        </div>
        <div class="card-body">
          <form action="{{ route('actualizartramite',['id_solicitante'=>$formato_ver[0][0]["id_solicitante"],'id_servicio'=>$formato_ver[0][0]["id_servicio"]])}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}
            @foreach ($formato_ver as $key =>$seccion)
            <div class="row">
                <h4 class="title">{{$seccion[0]["nombre_seccion"]}}:</h4>
            </div>
            
                @foreach ($seccion as $key2=>$campo)
                
                    @switch($campo["tipo_campo"])
                        @case('checkbox')                        
                        <label class="col-sm-2 col-form-label">{{$campo["nombre_campo"]}}</label>                  
                            @break                       
                        @default
                        <div class="row">
                        <label class="col-sm-2 col-form-label">{{$campo["nombre_campo"]}}:</label>
                            <div class="col-sm-10">
                              <div class="form-group">
                                <p class="form-control-static">{{$campo["valor"]}}</p>
                              </div>
                            </div> 
                          </div>
                    @endswitch
                @endforeach
            @endforeach
            @switch($formato_ver[1][0]["status"])
                @case(2)
                <div class="row">
                  <h4 class="title">Estatus:</h4>
              </div>
                  <label class="col-sm-2 col-form-label">Finalizada</label>
                  @break
                @case(3)
                <div class="row">
                  <h4 class="title">Estatus:</h4>
              </div>
                  <label class="col-sm-2 col-form-label">Rechazada</label>                     
                    @break               
                @default
                <div class="row">
                  <h4 class="title">Estatus:</h4>
              </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group {{ $errors->has('tipo_campo_id') ? ' has-error' : '' }}">                           
                      {!! Form::select('status', $status, null, ['class' => 'form-control','required'=>'required']) !!}
                      @if ($errors->has('status'))
                          <span class="help-block">
                              <strong>{{ $errors->first('categoria_id') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>
                 </div>
                 <input class="btn btn-primary pull-right" type="submit" value="Actualizar Trámite">
          <div class="clearfix"></div>
            @endswitch
          </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection

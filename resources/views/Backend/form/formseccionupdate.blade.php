@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="servicios" hidden disabled>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Modificar Sección</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          <!-- dd($noticia); -->

          <form action="{{ route('actualizarseccion',['id'=>$seccion->id])}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('nombre_seccion') ? ' has-error' : '' }}">
                {!! Form::label('nombre_seccion', 'Nombre de la Sección') !!}
                <input type="text" name="nombre_seccion" class="form-control" value="{{$seccion->nombre_seccion}}" required autofocus>
                @if ($errors->has('nombre_seccion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_seccion') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <h4 class="title {{ $errors->has('campo_id') ? ' has-error' : '' }}">Campos: </h4>
            @foreach($campo_id as $cam_id)
            <div class="col-md-1">
              <div class="form-group bmd-form-group {{ $errors->has('posicion_campo[]') ? ' has-error' : '' }}">
  
                {!! Form::label('posicion_campo[]', 'Posición') !!}
                @if($cam_id["registrado"]==1)
                <input type="tel" name="posicion_campo[]" class="form-control" value="{{$cam_id["posicion_campo"]}}">
                @else
                <input type="tel" name="posicion_campo[]" class="form-control" value="" >
                @endif
                @if ($errors->has('posicion_campo[]'))
                    <span class="help-block">
                        <strong>{{ $errors->first('posicion_campo[]') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('campo_id[]') ? ' has-error' : '' }}">
                <div class="form-check form-check-inline">
                <label  id="campo_id_ch[]" class="form-check-label">

                  @if($cam_id["registrado"]==1)
                  <input id="campo_id[]" name="campo_id[]" value="{{$cam_id["campo_id"]}}"  class="form-check-input" type="checkbox" checked>
                  {{$cam_id["nombre_campo"]}}
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                  @else
                  <input id="campo_id[]" name="campo_id[]" value="{{$cam_id["campo_id"]}}"  class="form-check-input" type="checkbox">
                  {{$cam_id["nombre_campo"]}}
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                  @endif
                </label>
              </div>
                @if ($errors->has('campo_id[]'))
                    <span class="help-block">
                        <strong>{{ $errors->first('campo_id[]') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            @endforeach
          </div>

          <input class="btn btn-primary pull-right" type="submit" value="Modificar Sección">
          <div class="clearfix"></div>
        </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection

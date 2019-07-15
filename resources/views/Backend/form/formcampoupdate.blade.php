@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="servicios" hidden disabled>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Modificar Campo</h4>
          <p class="card-category">Complete todos los datos</p>
          <a href="{{ route('formservicio')}}" class="card-category">
          <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
            <i class="material-icons">add_to_queue</i>
          </button>
           Agregar Servicio</a>
           <a href="{{ route('formseccion')}}" class="card-category">
           <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
             <i class="material-icons">photo_filter</i>
           </button>
            Agregar Sección</a>
        </div>
        <div class="card-body">
          <form action="{{ route('actualizarcampo',['id'=>$campo->id])}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('nombre_campo') ? ' has-error' : '' }}">
                {!! Form::label('nombre_campo', 'Nombre del Campo') !!}
                <input type="text" name="nombre_campo" class="form-control" value="{{$campo->nombre_campo}}" required autofocus>
                @if ($errors->has('nombre_campo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_campo') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('tipo_campo_id') ? ' has-error' : '' }}">

                {!! Form::label('tipo_campo_id', 'Tipo de Campo') !!}
                {!! Form::select('tipo_campo_id', $tipos_campos, $campo->tipo_campo_id, ['class' => 'form-control','required'=>'required']) !!}
                @if ($errors->has('tipo_campo_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('categoria_id') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <input class="btn btn-primary pull-right" type="submit" value="Modificar Campo">
          <div class="clearfix"></div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

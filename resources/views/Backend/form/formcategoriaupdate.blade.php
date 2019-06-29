@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="servicios" hidden disabled>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Modificar Categoría</h4>
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
            <a href="{{ route('formcampo')}}" class="card-category">
              <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
                <i class="material-icons">edit_attributes</i>
              </button>
               Agregar Campo</a>
        </div>
        <div class="card-body">
          <form action="{{ route('actualizarcategoria',['id'=>$categoria->id])}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('nombre_categoria') ? ' has-error' : '' }}">
                {!! Form::label('nombre_categoria', 'Nombre de la Categoría') !!}
                <input type="text" name="nombre_categoria" class="form-control" value="{{$categoria->nombre_categoria}}" required autofocus>
                @if ($errors->has('nombre_categoria'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre_categoria') }}</strong>
                    </span>
                @endif
              </div>
            </div>            
          </div>
          <input class="btn btn-primary pull-right" type="submit" value="Modificar Categoría">
          <div class="clearfix"></div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

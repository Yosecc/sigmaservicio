@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="servicios" hidden disabled>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Crear Sección</h4>
          <p class="card-category">Complete todos los datos</p>
          <a href="{{ route('formservicio')}}" class="card-category">
          <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
            <i class="material-icons">add_to_queue</i>
          </button>
           Agregar Servicio</a>
           <a href="{{ route('formcampo')}}" class="card-category">
           <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
             <i class="material-icons">edit_attributes</i>
           </button>
            Agregar Campo</a>
            <a href="{{ route('formcategoria')}}" class="card-category">
              <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
                <i class="material-icons">add_circle_outline</i>
              </button>
               Agregar Categoria</a>
        </div>
        <div class="card-body">
          <form action="{{ route('ingresarseccion')}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('nombre_seccion') ? ' has-error' : '' }}">
                {!! Form::label('nombre_seccion', 'Nombre de la Sección') !!}
                <input type="text" name="nombre_seccion" class="form-control" required autofocus>
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
            @foreach($campos as $campo)
            <div class="col-md-1">
              <div class="form-group bmd-form-group {{ $errors->has('posicion_campo[]') ? ' has-error' : '' }}">
  
                {!! Form::label('posicion_campo[]', 'Posición') !!}
                <input type="tel" name="posicion_campo[]" class="form-control" value="" >
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
                  <input id="campo_id[]" name="campo_id[]" value="{{$campo->id}}"  class="form-check-input" type="checkbox">
                  {{$campo->nombre_campo}}
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
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
          <input class="btn btn-primary pull-right" type="submit" value="Crear Sección">
          <div class="clearfix"></div>
          </form>

        </div>
      </div>
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Secciones</h4>
          <p class="card-category">Todos los campos registrados</p>
          <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
        </div>
        <div class="card-body">
          <div class="table-responsive">            
            <table class="table">
              <thead class=" text-primary">
                <tr><th>
                  Sección
                </th>
                <th>
                  Cant. Campos
                </th>
                <th>
                Fecha Publicación
                </th>
                <th>
                  Acciones
                </th>
              </tr></thead>
              <tbody>

                @foreach($secciones as $seccion)
                <tr>
                  <td>
                      {{ $seccion->nombre_seccion }}
                  </td>
                  <td>
                     {{ $cantidad_campos[$seccion->id] }}
                  </td>
                  <td>
                    {{ $seccion->updated_at}}
                  </td>
                  <td class="td-actions">
                    <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscarseccion',['id'=>$seccion->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Editar">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('eliminarseccion',['id'=>$seccion->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Remover">
                      <i class="material-icons">close</i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection

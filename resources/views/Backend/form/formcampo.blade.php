@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="servicios" hidden disabled>
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Crear Campo</h4>
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
            <a href="{{ route('formcategoria')}}" class="card-category">
              <button  type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Agregar">
                <i class="material-icons">add_circle_outline</i>
              </button>
               Agregar Categoria</a>
        </div>
        <div class="card-body">
          <form action="{{ route('ingresarcampo')}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('nombre_campo') ? ' has-error' : '' }}">
                {!! Form::label('nombre_campo', 'Nombre del Campo') !!}
                <input type="text" name="nombre_campo" class="form-control" required autofocus>
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
                {!! Form::select('tipo_campo_id', $tipos_campos, null, ['class' => 'form-control','required'=>'required']) !!}
                @if ($errors->has('tipo_campo_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('categoria_id') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <input class="btn btn-primary pull-right" type="submit" value="Crear Campo">
          <div class="clearfix"></div>
          </form>

        </div>
      </div>
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Campos</h4>
          <p class="card-category">Todos los campos registrados</p>
          <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
        </div>
        <div class="card-body">
          <div class="table-responsive">            
            <table class="table">
              <thead class=" text-primary">
                <tr><th>
                  Campo
                </th>
                <th>
                  Tipo de Campo
                </th>
                <th>
                Fecha Publicación
                </th>
                <th>
                  Acciones
                </th>
              </tr></thead>
              <tbody>

                @foreach($campos as $campo)
                <tr>
                  <td>
                      {{ $campo->nombre_campo }}
                  </td>
                  <td>
                     {{ $campo->tipo_campo }}
                  </td>
                  <td>
                    {{ $campo->updated_at}}
                  </td>
                  <td class="td-actions">
                    <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('buscarcampo',['id'=>$campo->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Editar">
                      <i class="material-icons">edit</i>
                    </button>
                    <button type="button" rel="tooltip" title="" onclick="location.href='{{ route('eliminarcampo',['id'=>$campo->id])}}'" class="btn btn-white btn-link btn-sm" data-original-title="Remover">
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
@push('scripts')
<script  type="text/javascript" charset="utf-8" async defer></script>
@endpush

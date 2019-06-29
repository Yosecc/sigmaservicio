@extends ('Backend.layout.layout')

@section('content')
<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
CKEDITOR.replace( 'editor',{
uiColor:"#DCDCDC",
toolbarGroups : [
  { name: 'basicstyles', groups: [ 'basicstyles'] },
  { name: 'paragraph',   groups: [ 'list', 'indent', 'align', 'bidi' ] },
  { name: 'document',	   groups: [ 'doctools' ] },
  { name: 'editing',     groups: ['spellchecker' ] },
  { name: 'styles' },
  { name: 'colors' },
  { name: 'tools' }
]
// removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript'
});
});
</script>
<input id="mostra_vista" value="slider" hidden disabled>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Crear Servicio</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
         

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Nombre') !!}
                {{$servicio->nombre}}
                @if ($errors->has('titulo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titulo') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('publico') ? ' has-error' : '' }}">
                <div class="form-check form-check-inline">
                <label id="publico" class="form-check-label">
                  <input  id="publicoval" name="publico"  class="form-check-input" type="checkbox" {{ $servicio->publico ? 'checked':''}} disabled>
                  Público
                  <span class="form-check-sign">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
                @if ($errors->has('publico'))
                    <span class="help-block">
                        <strong>{{ $errors->first('publico') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="form-group {{ $errors->has('contenido') ? ' has-error' : '' }}">
              {!! Form::label('contenido','Contenido') !!}
              <div class="form-group bmd-form-group">
                  <textarea id="editor" name="texto" class="form-control" rows="4" required="" disabled>{{$servicio->texto}}</textarea>
                @if ($errors->has('contenido'))
                    <span class="help-block">
                        <strong>{{ $errors->first('contenido') }}</strong>
                    </span>
                @endif
              </div>
            </div>
           </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('posicion', 'Categoria') !!} 
                <select class="form-control" name="categorias_id" required disabled>
                  @foreach(App\Categorias::all() as $categoria)
                  @if ( $categoria->id == $servicio->categorias_id)
                  <option value="{{$categoria->id}}" selected="selected">{{$categoria->titulo}}</option>
                  @else
                  <option value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                  @endif
                  @endforeach
                </select>
                @if ($errors->has('posicion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('posicion') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('posicion', 'Posición') !!}
                <select class="form-control" name="posicion" required  disabled>
                  @foreach(App\Servicios::all() as $posicion)
                  @if($posicion->id == $servicio->id)
                  <option value="{{$posicion->posicion}}" selected="selected">{{$posicion->posicion}}</option>
                  @else
                  <option value="{{$posicion->posicion}}">{{$posicion->posicion}}</option>
                  @endif
                  @endforeach
                </select>
                @if ($errors->has('posicion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('posicion') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
          <img src="{{url(Storage::url($servicio->imagen))}}" class="rounded" width="250" height="250">
            </div>
            
          </div>
          <div class="row">
          <a class="btn btn-primary pull-right"  href="{{ route('admin.servicio.index')}}" style="margin-left:25px;">Salir</a>
          </div>
          
          </div>
          <div class="clearfix"></div>
          
        </div>
      </div>

      </div>
      <!-- end card -->
    </div>
  </div>
@endsection
          

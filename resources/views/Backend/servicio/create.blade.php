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
          <form action="{{ route('admin.servicio.store')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Nombre') !!}
                <input type="text" name="nombre" class="form-control" required autofocus>
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
                  <input id="publicoval" name="publico"  class="form-check-input" type="checkbox">
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
                  <textarea id="editor" name="texto" class="form-control" rows="4" required=""></textarea>
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
                <select class="form-control" name="categorias_id" required>
                  @foreach(App\Categorias::all() as $categoria)
                  @if ($loop->first)
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
                <input type="number" class="form-control" name="posicion" required>
                @if ($errors->has('posicion'))
                    <span class="help-block">
                        <strong>{{ $errors->first('posicion') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-4 col-sm-4">
              <h4 class="title {{ $errors->has('url_imagen') ? ' has-error' : '' }}">Subir Imagen</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
    
                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Buscar</span>
                    <span class="fileinput-exists">Cambiar</span><input id="imagen" name="imagen" type="file" name="..." required>
                    @if ($errors->has('url_imagen'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url_imagen') }}</strong>
                        </span>
                    @endif
                  </span>
              </div>
            </div>
            
          </div>
          </div>
          <div class="clearfix"></div>
          <button class="btn btn-primary pull-right" type="submit" >Crear Servicio</button>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection
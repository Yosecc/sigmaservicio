@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="comentarios" hidden disabled>
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
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Modificar Comentario</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          <form action="{{ route('actualizarcomentario',['id'=>$comentario->id])}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                {!! Form::label('nombre', 'Nombre') !!}
                <input type="text" name="nombre" class="form-control" value="{{$comentario->nombre}}" required autofocus>
                @if ($errors->has('nombre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('procedencia') ? ' has-error' : '' }}">
                {!! Form::label('procedencia', 'Procedencia') !!}
                <input type="text" name="procedencia" class="form-control" value="{{$comentario->procedencia}}" required autofocus>
                @if ($errors->has('procedencia'))
                    <span class="help-block">
                        <strong>{{ $errors->first('procedencia') }}</strong>
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
                <textarea id="editor" name="contenido" class="form-control" rows="4" required>{{$comentario->contenido}}</textarea>
              </div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <h4 class="title {{ $errors->has('url_imagen') ? ' has-error' : '' }}">Subir Imagen</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                  <img id="preview-file" src="{{URL::to('/images')}}/comentarios/{{$comentario->url_imagen}}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new no-existente">Buscar</span>
                    <span class="fileinput-exists existente">Cambiar</span>

                    <input id="imagenup" name="url_imagen" type="file" value="{{$comentario->url_imagen}}" href="{{$comentario->url_imagen}}" accept="image/png, .jpeg, .jpg, image/gif" >

                    @if ($errors->has('url_imagen'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url_imagen') }}</strong>
                        </span>
                    @endif
                  </span>
                  <a href="#" class="btn btn-danger btn-round fileinput-exists quitarexistente" data-dismiss="fileinput"><i class="fa fa-times"></i>Quitar</a>
                </div>
              </div>
            </div>
          </div>
          <input class="btn btn-primary pull-right" type="submit" value="Modificar Comentario">
          <div class="clearfix"></div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection

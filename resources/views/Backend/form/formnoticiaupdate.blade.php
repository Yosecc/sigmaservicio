@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="noticias" hidden disabled>
<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script>
$(document).ready(function(){
  CKEDITOR.replace( 'editor2',{
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
          <h4 class="card-title">Modificar Noticia</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          <!-- dd($noticia); -->

          <form action="{{ route('actualizarnoticia',['id'=>$noticia->id])}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Titulo') !!}
                <input type="text" name="titulo" class="form-control" value="{{$noticia->titulo}}" required autofocus>
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
                <label id="publicoup" class="form-check-label">
                  <input id="publicovalup" name="publico" {{$noticia->publico}} class="form-check-input" type="checkbox">
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
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('fuente') ? ' has-error' : '' }}">
                {!! Form::label('fuente', 'Fuente') !!}
                <input type="text" name="fuente" class="form-control" value="{{$noticia->fuente}}">

                @if ($errors->has('fuente'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fuente') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
            <div class="form-group {{ $errors->has('resumen') ? ' has-error' : '' }}">
              {!! Form::label('resumen','Resumen (Opcional)') !!}
              <div class="form-group bmd-form-group">
                <textarea id="editor" name="resumen" class="form-control" rows="4" required>{{$noticia->resumen}}</textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
            {!! Form::label('descripcion','Descripción (Opcional)') !!}
            <div class="form-group bmd-form-group">
                <!-- {!! Form::label('resumen','Se representa en la vista previa de las noticias',['class' => 'bmd-label-floating-control']) !!} -->
              <textarea id="editor2" name="descripcion" class="form-control" rows="4" required>{{$noticia->descripcion}}</textarea>
              @if ($errors->has('descripcion'))
                  <span class="help-block">
                      <strong>{{ $errors->first('descripcion') }}</strong>
                  </span>
              @endif
            </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group bmd-form-group {{ $errors->has('email') ? ' has-error' : '' }}">

              {!! Form::label('posicion', 'Posición') !!}
              <select class="form-control" name="posicion" required>
                @foreach($posiciones_disponibles as $key=> $posicion_disponible)
                @if($posicion_disponible==$noticia->posicion)
                <option value="{{$posicion_disponible}}" selected="selected">{{$posicion_disponible}}</option>
                @else
                <option value="{{$posicion_disponible}}">{{$posicion_disponible}}</option>
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

        <div class="col-md-4">
          <div class="form-group bmd-form-group {{ $errors->has('url_multimedia') ? ' has-error' : '' }}">

            {!! Form::label('url_multimedia', 'Enlace Multimedia   O') !!}
            <input value="{{$noticia->url_multimedia}}" type="text" id="enlaceup" name="url_multimedia" class="form-control" >
            @if ($errors->has('url_multimedia'))
                <span class="help-block">
                    <strong>{{ $errors->first('url_multimedia') }}</strong>
                </span>
            @endif
          </div>
        </div>
      </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <h4 class="title {{ $errors->has('url_imagen') ? ' has-error' : '' }}">Subir Imagen</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                  <img id="preview-file" src="{{URL::to('/images')}}/noticias/{{$noticia->url_imagen}}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new no-existente">Buscar</span>
                    <span class="fileinput-exists existente">Cambiar</span>

                    <input id="imagenup" name="url_imagen" type="file" value="{{$noticia->url_imagen}}" href="{{$noticia->url_imagen}}" accept="image/png, .jpeg, .jpg, image/gif" >

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

          <input class="btn btn-primary pull-right" type="submit" value="Modificar Noticia">
          <div class="clearfix"></div>
        </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection

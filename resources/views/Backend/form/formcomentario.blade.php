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
          <h4 class="card-title">Crear Comentario</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          {!! Form::open(['route' => 'ingresarcomentario','enctype'=>'multipart/form-data','method'=>'POST']) !!}
           {{ csrf_field() }}
          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required', 'autofocus'=> 'autofocus']) !!}

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
                {!! Form::text('procedencia', null, ['class' => 'form-control' , 'required' => 'required', 'autofocus'=> 'autofocus']) !!}

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
                <textarea id="editor" class="form-control" name="contenido" rows="4" required></textarea>
              </div>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <h4 class="title {{ $errors->has('url_imagen') ? ' has-error' : '' }}">Subir Imagen</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                  <img src="{{URL::to('/material-dashboard-dark-edition-v2.1.0/assets')}}/img/image_placeholder.jpg" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Buscar</span>
                    <span class="fileinput-exists">Cambiar</span><input id="imagen" name="url_imagen" type="file" name="..." required>
                    @if ($errors->has('url_imagen'))
                        <span class="help-block">
                            <strong>{{ $errors->first('url_imagen') }}</strong>
                        </span>
                    @endif
                  </span>
                  <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i>Quitar</a>
                </div>
              </div>
            </div>
          </div>

            <input class="btn btn-primary pull-right" id="submit" type="submit" value="Crear Comentario">
          <div class="clearfix"></div>
{!! Form::close() !!}
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>

@endsection

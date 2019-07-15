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
          <h4 class="card-title">Crear Noticia</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          {!! Form::open(['route' => 'ingresarnoticia','enctype'=>'multipart/form-data','method'=>'POST']) !!}
           {{ csrf_field() }}
          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Titulo') !!}
                {!! Form::text('titulo', null, ['class' => 'form-control' , 'required' => 'required', 'autofocus'=> 'autofocus']) !!}

                @if ($errors->has('titulo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titulo') }}</strong>
                    </span>
                @endif
              </div>
            </div>
             <input name="_token" value="{{ csrf_token() }}" type="hidden" onclick=""></input>
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('publico') ? ' has-error' : '' }}">
                <div class="form-check form-check-inline">
                <label id="publico" class="form-check-label">
                  <input name="publico" class="form-check-input" type="checkbox">
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
                {!! Form::text('fuente', null, ['class' => 'form-control']) !!}

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
                <textarea id="editor" name="resumen" class="form-control" rows="4" required>&nbsp;</textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
          <div class="form-group {{ $errors->has('descripcion') ? ' has-error' : '' }}">
            {!! Form::label('descripcion','Descripción (Opcional)') !!}
            <div class="form-group bmd-form-group">
                <!-- {!! Form::label('resumen','Se representa en la vista previa de las noticias',['class' => 'bmd-label-floating-control']) !!} -->
              <textarea id="editor2" name="descripcion" class="form-control" rows="4" required>&nbsp;</textarea>
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
            <div class="form-group bmd-form-group {{ $errors->has('posicion') ? ' has-error' : '' }}">

              {!! Form::label('posicion', 'Posición') !!}
              <select class="form-control" name="posicion" required>
                @foreach($posiciones_disponibles as $key=> $posicion_disponible)
                @if($key==0)
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

            <input type="text" id="enlace" name="url_multimedia" class="form-control" >

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
                  <img src="{{URL::to('/material-dashboard-dark-edition-v2.1.0/assets')}}/img/image_placeholder.jpg" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Buscar</span>
                    <span class="fileinput-exists">Cambiar</span><input id="imagen" name="url_imagen" type="file" name="..." >
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

            <input class="btn btn-primary pull-right" type="submit" value="Crear Nota">
          <div class="clearfix"></div>
{!! Form::close() !!}
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>

@endsection

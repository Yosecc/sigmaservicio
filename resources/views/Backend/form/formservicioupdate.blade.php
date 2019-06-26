@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="servicios" hidden disabled>
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
          <h4 class="card-title">Modificar Servicio</h4>
          <p class="card-category">Complete todos los datos</p>
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
          <form action="{{ route('actualizarservicio',['id'=>$servicio->id])}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo_servicio') ? ' has-error' : '' }}">
                {!! Form::label('titulo_servicio', 'Nombre del Servicio') !!}
                <input type="text" name="titulo_servicio" value="{{$servicio->titulo_servicio}}" class="form-control" required autofocus>
                @if ($errors->has('titulo_servicio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titulo_servicio') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('monto', 'Costo del Servicio') !!}
                <input type="number" step="0.01" name="monto" value="{{$servicio->monto}}" class="form-control" required autofocus>
                @if ($errors->has('monto'))
                    <span class="help-block">
                        <strong>{{ $errors->first('monto') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
            <div class="form-group {{ $errors->has('contenido') ? ' has-error' : '' }}">
              {!! Form::label('descripcion_servicio','Breve Descripcion (Opcional)') !!}
              <div class="form-group bmd-form-group">
                  <textarea id="editor" name="descripcion_servicio" class="form-control" rows="4">{{$servicio->descripcion_servicio}}</textarea>
                @if ($errors->has('descripcion_servicio'))
                    <span class="help-block">
                        <strong>{{ $errors->first('descripcion_servicio') }}</strong>
                    </span>
                @endif
              </div>
            </div>
           </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group bmd-form-group {{ $errors->has('email') ? ' has-error' : '' }}">

                {!! Form::label('categoria_id', 'Categorias') !!}
                {!! Form::select('categoria_id', $categorias, $servicio->categoria_id, ['class' => 'form-control','required'=>'required']) !!}
                @if ($errors->has('categoria_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('categoria_id') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
          <h4 class="title {{ $errors->has('url_imagen') ? ' has-error' : '' }}">Secciones: </h4>
          @foreach($seccion_id as $seccion)
          <div class="col-md-1">
            <div class="form-group bmd-form-group {{ $errors->has('posicion_seccion[]') ? ' has-error' : '' }}">

              {!! Form::label('posicion_seccion[]', 'Posición') !!}
              @if($seccion["registrado"]==1)
              <input type="tel" name="posicion_seccion[]" class="form-control" value="{{$seccion["posicion_seccion"]}}">
              @else
              <input type="tel" name="posicion_seccion[]" class="form-control" value="" >
              @endif
              @if ($errors->has('posicion_seccion[]'))
                  <span class="help-block">
                      <strong>{{ $errors->first('posicion_seccion[]') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group bmd-form-group {{ $errors->has('seccion_id[]') ? ' has-error' : '' }}">
              <div class="form-check form-check-inline">
              <label  id="seccion_id_ch[]" class="form-check-label">
                @if($seccion["registrado"]==1)
                <input id="seccion_id[]" name="seccion_id[]" value="{{$seccion["seccion_id"]}}"  class="form-check-input" type="checkbox" checked>
                {{$seccion["nombre_seccion"]}}
                @else
                <input id="seccion_id[]" name="seccion_id[]" value="{{$seccion["seccion_id"]}}" class="form-check-input" type="checkbox">
                {{$seccion["nombre_seccion"]}}
                @endif
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
              </label>

            </div>
              @if ($errors->has('seccion_id[]'))
                  <span class="help-block">
                      <strong>{{ $errors->first('seccion_id[]') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          @endforeach
        </div>
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <h4 class="title {{ $errors->has('url_imagen') ? ' has-error' : '' }}">Subir Imagen</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                  <img id="preview-file" src="{{URL::to('/images')}}/servicios/{{$servicio->url_imagen}}" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new no-existente">Buscar</span>
                    <span class="fileinput-exists existente">Cambiar</span>
                    <input id="imagenup" name="url_imagen" type="file" value="{{$servicio->url_imagen}}" href="{{$servicio->url_imagen}}" accept="image/png, .jpeg, .jpg, image/gif">
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

          <input class="btn btn-primary pull-right" type="submit" value="Crear Servicio">
          <div class="clearfix"></div>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection

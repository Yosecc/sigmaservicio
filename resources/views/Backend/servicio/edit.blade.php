@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="slider" hidden disabled>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Crear Servicio</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.servicio.update', ['id'=> $servicio->id])}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Nombre') !!}
                <input type="text" name="nombre" class="form-control" required autofocus value="{{$servicio->nombre}}">
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
                  <input id="publicoval" name="publico"  class="form-check-input" type="checkbox" {{ $servicio->publico ? 'checked' : ''}}>
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
                  <textarea id="editor" name="texto" class="form-control" rows="4" required="">{{$servicio->texto}}</textarea>
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
                <select class="form-control" name="posicion" required>
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
            <div class="col-md-4 col-sm-4">
              <h4 class="title {{ $errors->has('url_imagen') ? ' has-error' : '' }}">Subir Imagen</h4>
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
    
                <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Buscar</span>
                    <span class="fileinput-exists">Cambiar</span><input id="imagen" name="imagen" type="file" name="..." >
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
          <button class="btn btn-primary pull-right" type="submit" >Actualizar Servicio</button>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection
@push('scripts')
 <script>
 

    var editor_config = {
    path_absolute : "{{ URL::to('/') }}/",
    selector: "#editor",
    plugins: [
    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars code fullscreen",
    "insertdatetime media nonbreaking save table contextmenu directionality",
    "emoticons template paste textcolor colorpicker textpattern",
    "image code"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }
      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
  tinymce.init(editor_config);
 </script>
@endpush
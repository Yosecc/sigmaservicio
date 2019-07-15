@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="slider" hidden disabled>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Crear Slider</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          <form action="{{ route('ingresarslider')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Titulo') !!}
                <input type="text" name="titulo" class="form-control" required autofocus>
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
            <div class="col-md-6">
            <div class="form-group {{ $errors->has('contenido') ? ' has-error' : '' }}">
              {!! Form::label('contenido','Contenido') !!}
              <div class="form-group bmd-form-group">
                  <textarea id="editor" name="contenido" class="form-control" rows="4" required=""></textarea>
                @if ($errors->has('contenido'))
                    <span class="help-block">
                        <strong>{{ $errors->first('contenido') }}</strong>
                    </span>
                @endif
              </div>
            </div>
           </div>
           <div class="col-md-6">
           <div class="form-group {{ $errors->has('contenido2') ? ' has-error' : '' }}">
             {!! Form::label('contenido2','Otro Contenido (Opcional)') !!}
             <div class="form-group bmd-form-group">
                 <textarea id="editor2" name="contenido2" class="form-control" rows="4">&nbsp;</textarea>
               @if ($errors->has('contenido2'))
                   <span class="help-block">
                       <strong>{{ $errors->first('contenido2') }}</strong>
                   </span>
               @endif
             </div>
           </div>
          </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('email') ? ' has-error' : '' }}">

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

          <input class="btn btn-primary pull-right" type="submit" value="Crear Slider">
          <div class="clearfix"></div>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection
@push('scripts')

<script  type="text/javascript" charset="utf-8" >
    $('#categoria_select').change(function(){
      var id_categoria = $(this).val();
      $('#servicios_select').html('');
      $.ajax({
        type: "GET",
        url: '{{ url("verserviciosuno") }}',
        dataType: "json",
        data: {id_categoria:id_categoria},
        success: function (data){
          //console.log(data)

           $.each( data, function(row, items){
              var option = option + $('#servicios_select').append('<option value="'+items.id+'">'+items.titulo_servicio+'</option>');
           });
        }
      });
    });

</script>


<script>
$(document).ready(function(){
CKEDITOR.replace( 'editor',{
uiColor:"#DCDCDC",
toolbarGroups : [
  { name: 'basicstyles', groups: [ 'basicstyles'] },
  { name: 'paragraph',   groups: [ 'list', 'indent', 'align', 'bidi' ] },
  { name: 'document',    groups: [ 'doctools' ] },
  { name: 'editing',     groups: ['spellchecker' ] },
  { name: 'styles' },
  { name: 'colors' },
  { name: 'tools' }
]
// removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript'
});
CKEDITOR.replace( 'editor2',{
uiColor:"#DCDCDC",
toolbarGroups : [
  { name: 'basicstyles', groups: [ 'basicstyles'] },
  { name: 'paragraph',   groups: [ 'list', 'indent', 'align', 'bidi' ] },
  { name: 'document',    groups: [ 'doctools' ] },
  { name: 'editing',     groups: ['spellchecker' ] },
  { name: 'styles' },
  { name: 'colors' },
  { name: 'tools' }
]
// removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript'
});
});
</script>
@endpush

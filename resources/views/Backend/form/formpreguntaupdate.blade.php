@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="preguntas" hidden disabled>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Modificar Pregunta Frecuente</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          <!-- dd($slider); -->

          <form action="{{ route('actualizarpregunta',['id'=>$pregunta->id])}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('pregunta') ? ' has-error' : '' }}">
                {!! Form::label('pregunta', 'Pregunta') !!}
                <input type="text" name="pregunta" class="form-control" value="{{$pregunta->pregunta}}" required autofocus>
                @if ($errors->has('pregunta'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pregunta') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('publico') ? ' has-error' : '' }}">
                <div class="form-check form-check-inline">
                  <label id="publicoup" class="form-check-label">
                    <input id="publicovalup" name="publico" {{$pregunta->publico}} class="form-check-input" type="checkbox">
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
            <div class="form-group {{ $errors->has('respuesta') ? ' has-error' : '' }}">
              {!! Form::label('respuesta','Respuesta') !!}
              <div class="form-group bmd-form-group">
                  <textarea id="editor" name="respuesta" class="form-control" rows="4" required>{{$pregunta->respuesta}}</textarea>
                @if ($errors->has('respuesta'))
                    <span class="help-block">
                        <strong>{{ $errors->first('respuesta') }}</strong>
                    </span>
                @endif
              </div>
            </div>
           </div>           
          </div>

          <div class="row">
            <div class="col-md-2">
              <div class="form-group bmd-form-group {{ $errors->has('posicion_pregunta') ? ' has-error' : '' }}">
                {!! Form::label('posicion_pregunta', 'Posición') !!}
                <select class="form-control" name="posicion_pregunta" required>
                  @foreach($posiciones_disponibles as $key=> $posicion_disponible)
                  @if($posicion_disponible==$pregunta->posicion_pregunta)
                  <option value="{{$posicion_disponible}}" selected="selected">{{$posicion_disponible}}</option>
                  @else
                  <option value="{{$posicion_disponible}}">{{$posicion_disponible}}</option>
                  @endif
                  @endforeach
                </select>
                @if ($errors->has('posicion_pregunta'))
                    <span class="help-block">
                        <strong>{{ $errors->first('posicion_pregunta') }}</strong>
                    </span>
                @endif
              </div>
            </div>
          </div>
          <input class="btn btn-primary pull-right" type="submit" value="Modificar Pregunta">
          <div class="clearfix"></div>
        </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection
@push('scripts')
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
});
</script>
@endpush

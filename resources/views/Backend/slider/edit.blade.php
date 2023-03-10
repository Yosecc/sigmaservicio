@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="slider" hidden disabled>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Actualizar Slider</h4>
          <p class="card-category">Complete todos los datos</p>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.slider.update', ['id' => $slider->id])}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Titulo') !!}
                <input type="text" name="titulo" class="form-control" required autofocus value="{{$slider->titulo}}">
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
                  <input id="publicoval" name="publico"  class="form-check-input" type="checkbox" {{$slider->publico ? 'checked':''}}>
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
                  <textarea id="editor" name="texto" class="form-control" rows="4" required="" >{{$slider->texto}}</textarea>
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
                {!! Form::label('posicion', 'Posición') !!} 
                <select class="form-control" name="posicion" required>
                  @foreach(App\Sliders::all() as $posicion)
                  @if($posicion->id == $slider->id)
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
          <button class="btn btn-primary pull-right" type="submit" >Actualizar Slider</button>
          </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection
@extends ('Backend.layout.layout')

@section('content')

<input id="mostra_vista" value="slider" hidden disabled>

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Categoria</h4>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-3">
              <div class="form-group bmd-form-group {{ $errors->has('titulo') ? ' has-error' : '' }}">
                {!! Form::label('titulo', 'Titulo') !!}
                {{$categoria->titulo}}
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
                  <input id="publicoval" name="publico"  class="form-check-input" type="checkbox" {{$categoria->publico ? 'checked':''}} disabled>
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
            <div class="col-md-4">
              <div class="form-group bmd-form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('posicion', 'Posición') !!} 
                <select class="form-control" name="posicion" required disabled>
                  @foreach(App\Categorias::all() as $posicion)
                  @if($posicion->id == $categoria->id)
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
          </div>
          <div class="row">
         <a class="btn btn-primary pull-right"  style="margin-left:25px;" href="{{ route('admin.categoria.index')}}" >Salir</a>
         </div>
            </div>
          </div>
          
          </div>
         
          </div>
          <div class="clearfix"></div>
          
          
          </form>
        </div>
      </div>
      <!-- end card -->
    </div>
  </div>
@endsection
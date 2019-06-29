@extends ('Backend.layout.layout')

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Crear Servicio</h4>
          <p class="card-category">Complete todos los datos</p>
       
        </div>
        <div class="card-body">
          <form action="{{ route('servicios.update')}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $tour->id }}">
          <div class="row">
            <div class="col-9">
              <div class="row">
                <div class="col-12 mt-4">
                  <div class="form-group">
                    <label for="titulo">Nombre del Tour</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="" required="" value="{{ $tour->nombre }}">
                  </div>
                </div>

                <div class="col-12 mt-4">
                  <div class="form-group">
                    <label for="descripcion">Descripción</label><br>
                    <textarea name="descripcion" id="descripcion" class="pt-3" required="">{{ $tour->descripcion }}</textarea>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <hr>
                  <p>Fechas Disponibles</p>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="fechaDesde">Desde</label>
                      <input type="date" name="fechaDesde" id="fechaDesde" class="form-control" value="{{ $tour->fechaDesde }}" required="">
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="fechaHasta">Hasta</label>
                      <input type="date" name="fechaHasta" id="fechaHasta" class="form-control" value="{{ $tour->fechaHasta }}" required="">
                  </div>
                </div>
                <div class="col-12">
                
                  <p>Horarios</p>
                </div>
                
                <div class="col-6">
                  <div class="form-group">
                    <label for="horarioDesde">Desde</label>
                      <input type="time" name="horarioDesde" id="horarioDesde" class="form-control" value="{{ $tour->horarioDesde }}" >
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="horarioHasta">Hasta</label>
                      <input type="time" name="horarioHasta" id="horarioHasta" class="form-control" value="{{ $tour->horarioHasta }}" >
                  </div>
                </div>

                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="stio">Sitio de Encuentro</label>
                      <input type="text" name="sitio" id="sitio" class="form-control" value="{{ $tour->sitio }}">
                  </div>
                </div>

                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="posicion">Posición</label>
                    <input type="number" class="form-control" value="{{$tour->posicion}}" name="posicion" id="posicion">
                      {{-- <select name="posicion" id="posicion" class="form-control">
                        @foreach ($posicion as $pos)
                          <option value="{{ $pos->posicion }}" @if ($pos->posicion == $tour->posicion)  selected="" @endif >{{ $pos->posicion }}</option>
                        @endforeach
                      </select> --}}
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                      <label for="estado">Estado</label>
                      <select name="estado" id="estado" class="form-control">
                        <option value="1" @if ($tour->estado == 1) selected="" @endif>Activo</option>
                        <option value="2" @if ($tour->estado == 2) selected="" @endif>Inactivo</option>
                      </select>
                  </div>
                </div>
                
              </div>
            </div>
            {{--  --}}
            <div class="col-3 mt-4">
              <div class="row">
                <div class="col-12">
                  <div class="form-control ">
                    <label for="descripcion">Imagen Principal</label><br>
                    <div class="fileinput fileinput-new text-center col-12 p-0" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                        <img src="{{ asset('images/servicios') }}/{{ $tour->img  }}" class="img-fluid img-placeholder" alt="">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                      <div class="col-12 p-0">
                        <span class="btn btn-rose btn-round btn-file col-12">
                          {{-- <span class="fileinput-new">Buscar</span> --}}
                          <input  id="imagen" name="url_imagen" class="col-12" type="file" name="..." >
                        </span>

                        <a href="#" class="btn btn-danger btn-round fileinput-exists quit d-none" data-dismiss="fileinput"><i class="fa fa-times"></i>Quitar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
              <div class="col-12 text-center">
                <input type="submit" class="btn btn-primary" name="" value="Guardar">
              </div>
          </div>

         
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
    CKEDITOR.replace( 'descripcion',{
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

    $('#imagen').change(function(){
        $('.img-placeholder').addClass('d-none');
        $('.quit').removeClass('d-none');
    });

  });


</script>
@endpush
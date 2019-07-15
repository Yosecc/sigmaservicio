
@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <div class="row align-items-center mb-0">
        <div class="col">
          <h4 class="card-title ">
			Daños del vehiculo #{{ $vehiculo->id }}
          </h4>          
        </div>
      </div>      
    </div>

    <div class="card-body ">
      <form action="{{ route('vehiculos.daños.store', $vehiculo->id) }}" class="container" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
          <div class="col col-md-7 offset-md-1">
            <label for="descripcion" class="text-dark">
              <strong>Descripción</strong>
            </label>
            <textarea name="descripcion" id="descripcion" cols="100%" rows="10" class="form-control bg-light" required></textarea>
            {{-- <div class="custom-file"> --}}
              <input type="file" class="form-control-file" name="pdf" accept="application/pdf" required>
              {{-- <label class="custom-file-label" for="archivo">Elije archivo</label> --}}
            {{-- </div> --}}
          </div>
          <div class="col col-md-4 text-center align-self-center">
            <div class="row">
              <div class="col ">
                <img id="imgSalida" src="{{ asset('images/img-default.png') }}" 
                  class="img-fluid " alt="Imágen por defecto">
                <input type="file" class="read-file read form-control-file mt-1" id="archivo" name="imagen" accept="image/*" required>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div>

  		</form> 
    </div>
  </div>

  <div class="card">
    <div class="card-header card-header-primary">
      <div class="row align-items-center mb-0">
        <div class="col">
          <h4 class="card-title ">
            Daños registrados
          </h4>          
        </div>
      </div>      
    </div>
        
    <div class="card-body container">
    @if( isset($vehiculo->daño) )
      <div class="row">
        <div class="col col-md-7 offset-md-1">
          <label for="descripcion" class="text-dark">
            <strong>Descripción</strong>
          </label>
          <textarea name="descripcion" id="descripcion" cols="100%" rows="10" class="form-control bg-light" readonly>{{ $vehiculo->daño->descripcion }}</textarea>
          Archivo PDF: 
          <a href="{{ asset('archivos/daños/pdf/'.$vehiculo->daño->archivo) }}" target="_blank">
            {{ $vehiculo->daño->archivo }}
          </a>
        </div>
        <div class="col col-md-4 text-center"> 
          <img id="imgSalida" src="{{ asset('archivos/daños/images/'.$vehiculo->daño->imagen) }}" 
            class="img-fluid " alt="Imágen por defecto" style="height: 10rem">
        </div>
      </div>
    @else
      <div class="row">
        <div class="col text-center">
          <h3>No hay daños registrados</h3>
        </div>
      </div>
    @endif
    </div>
  </div>
</div>



@endsection

@push('scripts')
<script>
$(function() {
  $('#archivo').change(function(e) {
    addImage(e); 
  });

  function addImage(e){
    var file = e.target.files[0],
    imageType = /image.*/;
    if (!file.type.match(imageType))
     return;
    var reader = new FileReader();
    reader.onload = fileOnload;
    reader.readAsDataURL(file);
  }

  function fileOnload(e) {
    var result=e.target.result;
    $('#imgSalida').attr("src",result);
  }

}); 
</script>
@endpush

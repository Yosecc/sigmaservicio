
@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <div class="row align-items-center mb-0">
        <div class="col">
          <h4 class="card-title ">
			Galería de fotos del vehículo #{{ $vehiculo->id }}
          </h4>          
        </div>
        <div class="col text-right">
        	<a class="btn btn-success btn-sm" href="{{ route('vehiculos.fotos.create', $vehiculo->id) }}">
        		<i class="fa fa-plus"></i>
				<i class="fa fa-camera"></i>
        		{{-- Subir fotos --}}
        	</a>
        </div>
      </div>      
    </div>

    <div class="card-body container-fluid">
     
    <div class="row text-center">
    	@forelse ($vehiculo->fotos as $foto)
    	<div class="col-2 col-sm-2 col-md-2 col-lg-2">
			<div class="row mb-0">
				<div class="col">
	 				<img src="{{ asset("images/galeria/".$foto->img) }}" width="100%" height="150px" style="border-radius: 10px; border: 5px">
				</div>
			</div>
			<div class="row">
				<div class="col">
	 				<form action="{{ route('vehiculos.fotos.destroy', $foto->id) }}" method="post">
	 					{{ csrf_field() }}
	 					{{ method_field('DELETE') }}
	 					<button type="submit" class="btn btn-danger btn-sm">
	 						<i class="fa fa-trash"></i>
	 					</button>
	 				</form>
				</div>
			</div>
	 			
    	</div>
		@empty
			<div class="col class="text-center"">
		    	<h3 >No hay imagenes subidas</h3>				
			</div>
	    @endforelse
    </div>
		
      
    </div>
  </div>
</div>



@endsection

@push('scripts')

@endpush

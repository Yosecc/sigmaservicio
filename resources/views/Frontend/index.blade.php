@extends ('Frontend.layouts.layout')

	@section('content')

		<!-- Hero Slider -->	
		@include('Frontend.template.home')		
		<!-- Features -->
		@include('Frontend.template.features')
		<!-- Services -->
		<div id="app">
			<services
			:categorias="{{ json_encode($categorias) }}"
			:servicios="{{ json_encode($servicios) }}"
			:asset="'{{ asset(Storage::url('')) }}'"
			></services>
		</div>
		@include('Frontend.template.services')	
		<!-- Testimonials -->
		@include('Frontend.template.testimonials')	
		<!-- Services -->
		@include('Frontend.template.about')	
		<!-- Clients -->
		@include('Frontend.template.clients')	
		<!-- Contact -->
		@include('Frontend.template.contacts')	

	@endsection
@push('scripts')

@endpush
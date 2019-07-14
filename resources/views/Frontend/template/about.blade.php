<div class="about prlx_parent">
	<div class="about_background prlx" style="background-image:url({{ asset('frontend/images//bg1.jpeg') }})"></div>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center section_title">
					<h2>Servicios</h2>
				</div>
			</div>
			<div class="row align-items-end">

				@foreach ($categorias as $categoria)
					@foreach ($categoria->servicio as $servicio)
					<div class="col-lg-4">
						<div class="card border-0" style="overflow: hidden; box-shadow: 5px 5px 5px black; border-radius: 0px">
							<div class="features_item d-flex flex-column align-items-center justify-content-end text-center">
								<img src="{{ Helper::imgValidate($servicio->imagen) }}" class="img-fluid" alt="">
							</div>
							<div class="p-3 text-center d-flex justify-content-between align-items-center">
									<a href="#" class="d-flex justify-content-between align-items-center w-100 btn-service" style="">
										<h3 class="m-0">{{ $servicio->nombre }}</h3>
										<i class="fas fa-arrow-right"></i>
									</a>
							</div>
						</div>				
					</div>
					@endforeach
				@endforeach

			</div>
		</div>
	
</div>
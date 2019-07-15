<div class="clients pt-0">
	<div class="container ">

		<div class="row">
			<div class="col">
				
				<!-- Clients Slider Marcas -->

				<div class="clients_slider_container">
					<div class="owl-carousel owl-theme clients_slider">
					
					@foreach ($marcas as $item)
						<!-- Slider Item -->
						<div class="owl-item clients_item">
							<img src="{{ Helper::imgValidate($item->imagen) }}" class="img-fluid px-3" alt="">
						</div>
					@endforeach
						

						

					</div>
				</div>

			</div>
		</div>

	</div>
</div>
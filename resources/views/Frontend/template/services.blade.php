{{--  <div id="servicios" class="about prlx_parent">
        <div class="about_background prlx" style="background-image:url('frontend/images/bg1.jpeg')"></div>
        
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center section_title">
                        <h2>Servicios</h2>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <button class="btn-filter btn btn-primary" type="button">buton</button>
                    <button class="btn-filter btn btn-primary" type="button">buton</button>
                    <button class="btn-filter btn btn-primary" type="button">buton</button>
                </div>
                <div class="row align-items-end">



                    @foreach ($categorias as $categoria)
                        @foreach ($categoria->servicio as $servicio)
                        <div class="col-lg-4 col-sm-6 mt-3">
                            <div class="card border-0" style="overflow: hidden; box-shadow: 5px 5px 5px black; border-radius: 0px">

                                <div class="features_item d-flex flex-column align-items-center justify-content-end text-center">
                                    <div class="overlay">
                                        <div class="row h-100">
                                            <div class="col-12 text-center d-flex justify-content-center align-items-center">
                                                <a href="" data-id="{{ $servicio->id}}" data-toggle="modal" data-target="#modalServicio" class="btn btn-primary btn-services-cotizar item-servicio">VER MÁS</a>
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ Helper::imgValidate($servicio->imagen) }}" class="img-fluid m-0" alt="">
                                </div>
                                <div class="p-3 text-center d-flex justify-content-between align-items-center">
                                    <h3 class="m-0">{{ $servicio->nombre }}</h3>
                                       
                                </div>
                            </div>              
                        </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        
    </div> --}}

<div class="modal fade modal-style modal-servicio" id="modalServicio" tabindex="-1" role="dialog" aria-labelledby="modalServicio" aria-hidden="true">
  <div class="modal-dialog col-12" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title nombre-servicio-modal" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body texto-servicio-modal">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        {{-- <input type="submit" class="btn btn-primary" name="enviar" value="Guardar"> --}}
        
      </div>
    </div>
  </div>
</div>
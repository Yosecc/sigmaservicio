@extends ('Backend.layout.layout')

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Configuración</h4>
       
        </div>
        <div class="card-body">
          <form action="{{ route('configuracion.store')}}" method="POST" enctype="multipart/form-data">
 {{ csrf_field() }}

          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" value="@isset ($title) {{ $title }} @endisset" name="title" id="title" placeholder="" >
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" value="@isset ($telefono) {{ $telefono }} @endisset" name="telefono" id="telefono" placeholder="">
                  </div>
                </div>

                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="@isset ($email) {{ $email }} @endisset" name="email" id="email" placeholder="">
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" value="@isset ($direccion) {{ $direccion }} @endisset" name="direccion" id="direccion" placeholder="">
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="ubicacion">Ubicación (Iframe)</label>
                    <input type="text" class="form-control" value="@isset ($ubicacion) {{ $ubicacion }} @endisset" name="ubicacion" id="ubicacion" placeholder="">
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="video">Video (Iframe)</label>
                    <input type="text" class="form-control" value="@isset ($video) {{ $video }} @endisset" name="video" id="video" placeholder="">
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="facebook">Facebook (link)</label>
                    <input type="text" class="form-control" value="@isset ($facebook) {{ $facebook }} @endisset" name="facebook" id="facebook" placeholder="">
                  </div>
                </div>
                 <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="twitter">Twitter (link)</label>
                    <input type="text" class="form-control" value="@isset ($twitter) {{ $twitter }} @endisset" name="twitter" id="twitter" placeholder="">
                  </div>
                </div>
                 <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="instagram">Instagram (link)</label>
                    <input type="text" class="form-control" value="@isset ($instagram) {{ $instagram }} @endisset" name="instagram" id="instagram" placeholder="">
                  </div>
                </div>
                 <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="descripcion">Descripción (Footer)</label>
                    <input type="text" class="form-control" value="@isset ($descripcion) {{ $descripcion }} @endisset" name="descripcion" id="descripcion" placeholder="" maxlength="100">
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="meta_description">Meta Descripción</label>
                    <input type="text" class="form-control" value="@isset ($meta_description) {{ $meta_description }} @endisset" name="meta_description" id="meta_description" placeholder="" maxlength="100">
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="meta_name">Meta Nombre</label>
                    <input type="text" class="form-control" value="@isset ($meta_name) {{ $meta_name }} @endisset" name="meta_name" id="meta_name" placeholder="">
                  </div>
                </div>
                <div class="col-6 mt-4">
                  <div class="form-group">
                    <label for="meta_url">Meta Url</label>
                    <input type="text" class="form-control" value="@isset ($meta_url) {{ $meta_url }} @endisset" name="meta_url" id="meta_url" placeholder="">
                  </div>
                </div>
                

                <div class="col-12 mt-4">
                  <div class="form-group">
                    <label for="politica_privacidad">Política de Privacidad</label><br>
                    <textarea name="politica_privacidad"  id="politica_privacidad" class="pt-3">@isset ($politica_privacidad) {{ $politica_privacidad }} @endisset</textarea>
                  </div>
                </div>
                </div>
              </div>
            </div>
            {{--  --}}
           {{--  <div class="col-3 mt-4">
              <div class="row">
                <div class="col-12">
                  <div class="form-control ">
                    <label for="descripcion">Imagen Principal</label><br>
                    <div class="fileinput fileinput-new text-center col-12 p-0" data-provides="fileinput">
                      <div class="fileinput-new thumbnail">
                        <img src="{{ asset('/material-dashboard-dark-edition-v2.1.0/assets/img/image_placeholder.jpg') }}" class="img-fluid img-placeholder" alt="">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                      <div class="col-12 p-0">
                        <span class="btn btn-rose btn-round btn-file col-12">
                        
                          <input  id="imagen" name="url_imagen" class="col-12" type="file" name="..." required>
                        </span>

                        <a href="#" class="btn btn-danger btn-round fileinput-exists quit d-none" data-dismiss="fileinput"><i class="fa fa-times"></i>Quitar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div> --}}
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
    CKEDITOR.replace( 'politica_privacidad',{
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
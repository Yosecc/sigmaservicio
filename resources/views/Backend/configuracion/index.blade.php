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
              <div class="col-6 mt-4">
                <div class="form-group">
                  <label for="title">Título</label>
                  <input type="text" class="form-control" value="@isset ($title) {{ $title }} @endisset" name="title" id="title" placeholder="" >
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
                    <input type="text" class="form-control" value="@isset ($descripcion) {{ $descripcion }} @endisset" name="descripcion" id="descripcion" placeholder="" maxlength="155">
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
                    <label for="meta_url">Meta Url</label>
                    <input type="text" class="form-control" value="@isset ($meta_url) {{ $meta_url }} @endisset" name="meta_url" id="meta_url" placeholder="">
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="form-group">
                    <label for="meta_url">Adress 1</label>
                    <div class="form-group bmd-form-group">
                      <textarea id="adress1" class="form-control" name="adress1" rows="4" required>@isset ($adress1) {{ $adress1 }} @endisset</textarea>
                    </div>
                  </div>
                </div>
                <div class="col-12 mt-4">
                  <div class="form-group">
                    <label for="meta_url">Adress 2</label>
                    <div class="form-group bmd-form-group">
                      <textarea id="adress2" class="form-control" name="adress2" rows="4" required>@isset ($adress2) {{ $adress2 }} @endisset</textarea>
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
  </div>
</div>
@endsection
@push('scripts')

<script>
  $(document).ready(function(){
    CKEDITOR.replace( 'adress2',{
    uiColor:"#DCDCDC",
    // toolbarGroups : [
    //   { name: 'basicstyles', groups: [ 'basicstyles'] },
    //   { name: 'paragraph',   groups: [ 'list', 'indent', 'align', 'bidi' ] },
    //   { name: 'document',    groups: [ 'doctools' ] },
    //   { name: 'editing',     groups: ['spellchecker' ] },
    //   { name: 'styles' },
    //   { name: 'colors' },
    //   { name: 'tools' }
    // ]
    // removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript'
    });

    CKEDITOR.replace( 'adress1',{
    uiColor:"#DCDCDC",
    // toolbarGroups : [
    //   { name: 'basicstyles', groups: [ 'basicstyles'] },
    //   { name: 'paragraph',   groups: [ 'list', 'indent', 'align', 'bidi' ] },
    //   { name: 'document',    groups: [ 'doctools' ] },
    //   { name: 'editing',     groups: ['spellchecker' ] },
    //   { name: 'styles' },
    //   { name: 'colors' },
    //   { name: 'tools' }
    // ]
    // removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,Underline,Strike,Subscript,Superscript'
    });

    $('#imagen').change(function(){
        $('.img-placeholder').addClass('d-none');
        $('.quit').removeClass('d-none');
    });

  });


</script>
@endpush
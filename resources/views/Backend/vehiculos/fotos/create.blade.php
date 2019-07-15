@extends ('Backend.layout.layout')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <div class="row align-items-center mb-0">
        <div class="col">
          <h4 class="card-title ">
            Agregar imágenes al vehiculo #{{ $vehiculo->id }}
          </h4>          
        </div>
        <div class="col text-right">
          <a class="btn btn-success btn-sm" 
            href="{{ route('vehiculos.fotos.index', $vehiculo->id) }}" title="A galería">
            <i class="fa fa-arrow-left"></i>
            {{-- Subir fotos --}}
          </a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="container">
      {{--   <div class="row">
          <div class="col"> --}}   
             <div class="row" style="margin-bottom: 1rem;">
              <div class="col-md-6 col-sm-12" 
              style="padding-top: 1rem; padding-bottom: 1rem;">
                
                <!-- Our markup, the important part here! -->
                <div id="drag-and-drop-zone" class="dm-uploader p-5 " 
                style="border: 0.25rem dashed #A5A5C7;text-align: center;">
                  <h3 class="mb-5 mt-5 text-muted">Arrastra y suelta tus archivos aqui!</h3>

                  <form class="btn btn-primary btn-block mb-5" enctype="multipart/form-data " >
                      <span>Abrir el buscador de archivos</span>
                      <input type="file" title='Click to add Files' 
                      style="position: absolute;
                        top: 0;
                        right: 0;
                        margin: 0;
                        border: solid transparent;
                        width: 100%;
                        opacity: .0;
                        filter: alpha(opacity= 0);
                        cursor: pointer;" />
                  </form>
                </div><!-- /uploader -->
                
                <div class="mt-2">
                  <a href="#" class="btn btn-primary" id="btnApiStart">
                    <i class="fa fa-play"></i> Iniciar
                  </a>
                  <a href="#" class="btn btn-danger" id="btnApiCancel">
                    <i class="fa fa-stop"></i> Detener
                  </a>
                </div>
              </div>
              <div class="col-md-6 col-sm-12" 
              style="padding-top: 1rem; padding-bottom: 1rem;">
                <div class="card h-100 m-0">
                  <div class="card-header bg-secondary text-light">
                    Lista de archivos
                  </div>

                  <ul class="list-unstyled p-2 d-flex flex-column col mb-0" id="files"
                   style=" overflow-y: scroll !important; min-height: 320px;">
                    <li class="text-muted text-center empty">No hay archivos subidos</li>
                  </ul>
                </div>
              </div>
            </div><!-- /file list -->

            <div class="row" style="margin-bottom: 1rem;">
              <div class="col-12">
                 <div class="card h-100 m-0">
                  <div class="card-header bg-secondary text-light">
                    Mensajes de depuración
                  </div>

                  <ul class="list-group list-group-flush" id="debug" 
                  style="overflow-y: scroll !important;height: 150px;  ">
                    <li class="list-group-item text-muted empty">Cargando plugin....</li>
                  </ul>
                </div>
              </div>
            </div> <!-- /debug -->
{{-- 
        </div>
      </div> --}}
    </div>
  </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('plugins/uploader-master/dist/js/jquery.dm-uploader.min.js') }}"></script>
<script>
$(function(){
  /*
   * For the sake keeping the code clean and the examples simple this file
   * contains only the plugin configuration & callbacks.
   * 
   * UI functions ui_* can be located in:
   *   - assets/demo/uploader/js/ui-main.js
   *   - assets/demo/uploader/js/ui-multiple.js
   *   - assets/demo/uploader/js/ui-single.js
   */
  $('#drag-and-drop-zone').dmUploader({ //
    url: '{{ route('vehiculos.fotos.store', $vehiculo->id) }}',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      // 'Content-type': 'application/json;charset=utf-8'
    },
    maxFileSize: 3*1000000, // 3 Megs 
    allowedTypes: 'image/*',
    auto: false,
    queue: true,
    extFilter: ["jpg", "jpeg","png","gif"],
    onDragEnter: function(){
      // Happens when dragging something over the DnD area
      this.addClass('active');
    },
    onDragLeave: function(){
      // Happens when dragging something OUT of the DnD area
      this.removeClass('active');
    },
    onInit: function(){
      // Plugin is ready to use
      ui_add_log('Penguin initialized :)', 'info');
    },
    onComplete: function(){
      // All files in the queue are processed (success or error)
      ui_add_log('Todos los archivos pendientes por subir finalizados');
    },
    onNewFile: function(id, file){
      // When a new file is added using the file selector or the DnD area
      ui_add_log('New file added #' + id);
      ui_multi_add_file(id, file);
      
      if (typeof FileReader !== 'undefined'){
        var reader = new FileReader();
        var img = $('<img />');
          
        reader.onload = function (e) {
          img.attr('src', e.target.result)
        }
          console.log(img)
        /* ToDo: do something with the img! */
        reader.readAsDataURL(file);

      }
    },
    onBeforeUpload: function(id){
      // about tho start uploading a file
      ui_add_log('Starting the upload of #' + id);
      ui_multi_update_file_progress(id, 0, '', true);
      ui_multi_update_file_status(id, 'uploading', 'Subiendo...');
    },
    onUploadProgress: function(id, percent){
      // Updating file progress
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      // A file was successfully uploaded
      console.log(data.mensaje)
      ui_add_log('Server Response for file #' + id + ': ' + JSON.stringify(data));
      ui_add_log('Subida del archivo #' + id + ' COMPLETADA', 'success');
      ui_multi_update_file_status(id, 'success', 'Subida Completa');
      ui_multi_update_file_progress(id, 100, 'success', false);
    },
    onUploadCanceled: function(id) {
      ui_multi_update_file_status(id, 'warning', 'Cancelado');
      ui_multi_update_file_progress(id, 0, 'warning', false);
      ui_multi_update_file_controls(id, true, false);
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // When the browser doesn't support this plugin :(
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      ui_add_log('File \'' + file.name + '\' no puede ser añadido: limite de tamaño excedido', 'danger');
    },
    onFileTypeError: function(file){
      ui_add_log('File \'' + file.name + '\' no puede ser añadido: debe ser una imagen (error de tipo)', 'danger');
    },
    onFileExtError: function(file){
      ui_add_log('File \'' + file.name + '\' no puede ser añadido: debe ser una imagen (error de extensión)', 'danger');
    }
  });
});
</script>
<script>
  /*
    Global controls
  */
  $('#btnApiStart').on('click', function(evt){
    evt.preventDefault();
    
    $('#drag-and-drop-zone').dmUploader('start');
  });

  $('#btnApiCancel').on('click', function(evt){
    evt.preventDefault();

    $('#drag-and-drop-zone').dmUploader('cancel');
  });
</script>
<script>
    /*
   * Some helper functions to work with our UI and keep our code cleaner
   */

// Adds an entry to our debug area
function ui_add_log(message, color)
{
  var d = new Date();

  var dateString = (('0' + d.getHours())).slice(-2) + ':' +
    (('0' + d.getMinutes())).slice(-2) + ':' +
    (('0' + d.getSeconds())).slice(-2);

  color = (typeof color === 'undefined' ? 'muted' : color);

  var template = $('#debug-template').text();
  template = template.replace('%%date%%', dateString);
  template = template.replace('%%message%%', message);
  template = template.replace('%%color%%', color);
  
  $('#debug').find('li.empty').fadeOut(); // remove the 'no messages yet'
  $('#debug').prepend(template);
}

// Creates a new file and add it to our list
function ui_multi_add_file(id, file)
{
  var template = $('#files-template').text();
  template = template.replace('%%filename%%', file.name);

  template = $(template);
  template.prop('id', 'uploaderFile' + id);
  template.data('file-id', id);

  $('#files').find('li.empty').fadeOut(); // remove the 'no files yet'
  $('#files').prepend(template);
}

// Changes the status messages on our list
function ui_multi_update_file_status(id, status, message)
{
  $('#uploaderFile' + id).find('span').html(message).prop('class', 'status text-' + status);
}

// Updates a file progress, depending on the parameters it may animate it or change the color.
function ui_multi_update_file_progress(id, percent, color, active)
{
  color = (typeof color === 'undefined' ? false : color);
  active = (typeof active === 'undefined' ? true : active);

  var bar = $('#uploaderFile' + id).find('div.progress-bar');

  bar.width(percent + '%').attr('aria-valuenow', percent);
  bar.toggleClass('progress-bar-striped progress-bar-animated', active);

  if (percent === 0){
    bar.html('');
  } else {
    bar.html(percent + '%');
  }

  if (color !== false){
    bar.removeClass('bg-success bg-info bg-warning bg-danger');
    bar.addClass('bg-' + color);
  }
}
// Toggles the disabled status of Star/Cancel buttons on one particual file
function ui_multi_update_file_controls(id, start, cancel, wasError)
{
  wasError = (typeof wasError === 'undefined' ? false : wasError);

  $('#uploaderFile' + id).find('button.start').prop('disabled', !start);
  $('#uploaderFile' + id).find('button.cancel').prop('disabled', !cancel);

  if (!start && !cancel) {
    $('#uploaderFile' + id).find('.controls').fadeOut();
  } else {
    $('#uploaderFile' + id).find('.controls').fadeIn();
  }

  if (wasError) {
    $('#uploaderFile' + id).find('button.start').html('Retry');
  }
}
function ui_single_update_active(element, active)
{
  element.find('div.progress').toggleClass('d-none', !active);
  element.find('input[type="text"]').toggleClass('d-none', active);

  element.find('input[type="file"]').prop('disabled', active);
  element.find('.btn').toggleClass('disabled', active);

  element.find('.btn i').toggleClass('fa-circle-o-notch fa-spin', active);
  element.find('.btn i').toggleClass('fa-folder-o', !active);
}

function ui_single_update_progress(element, percent, active)
{
  active = (typeof active === 'undefined' ? true : active);

  var bar = element.find('div.progress-bar');

  bar.width(percent + '%').attr('aria-valuenow', percent);
  bar.toggleClass('progress-bar-striped progress-bar-animated', active);

  if (percent === 0){
    bar.html('');
  } else {
    bar.html(percent + '%');
  }
}

function ui_single_update_status(element, message, color)
{
  color = (typeof color === 'undefined' ? 'muted' : color);

  element.find('small.status').prop('class','status text-' + color).html(message);
}
</script>
<script type="text/html" id="files-template">
  <li class="media">
    <div class="media-body mb-1">
      <p class="mb-2">
        <strong>%%filename%%</strong> - Status: <span class="text-muted">Waiting</span>
      </p>
      <div class="progress mb-2">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" 
          role="progressbar"
          style="width: 0%" 
          aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
        </div>
      </div>
      <hr class="mt-1 mb-1" />
    </div>
  </li>
</script>

<!-- Debug item template -->
<script type="text/html" id="debug-template">
  <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
</script>
@endpush

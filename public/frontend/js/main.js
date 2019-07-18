modalServicio()

function modalServicio(){
	$(document).on('click', '.item-servicio', function(event){
		id = $(this).data('id')
    console.log('el id= '+id)
			$('.nombre-servicio-modal').html('')
     		$('.texto-servicio-modal').html('')
       
	 	$.ajax({
            url: route('servicio-ajax',id),
            type: "get",
            dataType: "json",
            // data: {id:id},
            cache: false,
            contentType: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
     		// processData: false,
     		beforeSend: function() {
     			
    		},
     		success: function(data) {
          // console.log(data)
     			$('.nombre-servicio-modal').html(data.servicio.nombre)
     			$('.texto-servicio-modal').html(data.servicio.texto)

                
            },
            error: function(data){
              // console.log(data)
            },
        })	
	})   
}

scrolMenu()

function scrolMenu(){

    $('a[href^="#"]').click(function() {
    var destino = $(this.hash);
    if (destino.length == 0) {
      destino = $('a[name="' + this.hash.substr(1) + '"]');
    }
    if (destino.length == 0) {
      destino = $('html');
    }
    $('html, body').animate({ scrollTop: destino.offset().top }, 500);
    return false;
  });
}

$('#contact-form').submit(function(event) {
        event.preventDefault()
        var f = $(this);
            var formData = new FormData(document.getElementById("contact-form"));
            $.ajax({
                url: 'form-contacto',
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                   $('div[class^="invalid-"').html('')
                   $('.form-control').removeClass('is-invalid')
                   $('.submit-e').fadeOut(1000)
                   $('#loading2').fadeIn(1000)
                },
                success: function(data) {
                  $('#cont-form2').fadeOut(1000)
                  $('#check2').fadeIn(1000);
                  $('.submit-e').fadeIn(1000)
                  $('#loading2').fadeOut(1000)
                },
                error: function(data){
                  $('.submit-e').fadeIn(1000)
                  $('#loading2').fadeOut(1000)
                   error = data.responseJSON.errors

                    $.each(error, function(key,value) {
                        $('#'+key+'-contact').addClass('is-invalid')
                        $('.invalid-'+key).html(value)
                    });
                },
            })  
    });
$('#form_cotizacion').submit(function(event) {
        event.preventDefault()
        var f = $(this);
            var formData = new FormData(document.getElementById("form_cotizacion"));
            $.ajax({
                url: 'form_cotizacion',
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                   $('div[class^="invalid-"').html('')
                   $('.form-control').removeClass('is-invalid')
                   $('.submit-e').fadeOut(1000)
                   $('#loading').fadeIn(1000)
                },
                success: function(data) {
                    // $('.alert').addClass('alert-success').html('Mensaje enviado correctamente').fadeIn( 300 ).delay(1500).fadeOut(1500);
                    // $('#btn-submit-contact').fadeIn(1)
                    // $('#load-contact').fadeOut(1)
                    // console.log('entra')
                   $('#cont-form').fadeOut(1000)
                   $('#check').fadeIn(1000);
                   $('.submit-e').fadeIn(1000)
                   $('#loading').fadeOut(1000)
                    // console.log(data)
                    
                },
                error: function(data){
                  $('.submit-e').fadeIn(1000)
                  $('#loading').fadeOut(1000)
                   erro = data.responseJSON.errors

                    $.each(erro, function(key,value) {
                        $('#'+key+'-contact').addClass('is-invalid')
                        $('.invalid-'+key).html(value)
                    });
                },
            })  
    });
modalServicio()

function modalServicio(){
	$(document).on('click', '.item-servicio', function(event){
		id = $(this).data('id')
			$('.nombre-servicio-modal').html('')
     		$('.texto-servicio-modal').html('')
	 	$.ajax({
            url: 'servicio-ajax',
            type: "get",
            dataType: "json",
            data: {id:id},
            cache: false,
            contentType: false,
     		// processData: false,
     		beforeSend: function() {
     			// $('#btn-submit-contact').fadeOut(1)
     			// $('#load-contact').fadeIn(1)
    		},
     		success: function(data) {
     			$('.nombre-servicio-modal').html(data.servicio.nombre)
     			$('.texto-servicio-modal').html(data.servicio.texto)

                
            },
            error: function(data){
        //     	$('.alert').addClass('alert-danger').html('Se ha presentado un error, intentelo nuevamente. si el problema persiste comuniquese con el webmaster').fadeIn( 300 ).delay(1500).fadeOut(1500);

        //     	$('#btn-submit-contact').fadeIn(1)
     			// $('#load-contact').fadeOut(1)

            },
        })	
	})
}



	function GuardarEditorial(){
		var parametros = {
			"veditorial" : $('#txtEditorial').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DNuevoEditorial.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando");
				},

				success:function(datos){
					document.forms['FormAgregarEditorial'].reset();
					$('#CajaMensaje').slideDown("fast");
					$('#CajaMensaje').html(datos);
				}
		});
	}
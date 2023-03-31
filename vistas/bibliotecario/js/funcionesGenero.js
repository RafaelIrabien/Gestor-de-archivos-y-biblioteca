
	function GuardarGenero(){
		var parametros = {
			"vgenero" : $('#txtGenero').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DNuevoGenero.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando");
				},

				success:function(datos){
					document.forms['FormAgregarGenero'].reset();
					$('#CajaMensaje').slideDown("fast");
					$('#CajaMensaje').html(datos);
				}
		});
	}


	function ModificarGenero(){
		var parametros = {
			"vcod" : $('#txtcodGeneroMod').val(),
			"vgen" : $('#txtGeneroMod').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DModificarGenero.php",
				beforeSend:function(){
					$("#CajaMensaje").html("Procesando")
				},
				success:function(datos){
					document.forms['FormModificarEditorial'].reset();
					$("#CajaMensaje").slideDown("fast");
					$("#CajaMensaje").html(datos);
				}
		});
	}



	function EliminarEditorial(){
		var parametros = {
			"vcod" : $('#txtcodEditorialEli').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DEliminarEditorial.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando")
				},
				success:function(datos){
					document.forms['FormEliminarEditorial'].reset();
					$('#CajaMensaje').slideDown("fast");
					$('#CajaMensaje').html(datos);
				}
		});
	}
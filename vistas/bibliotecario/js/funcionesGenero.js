
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


	function ModificarEditorial(){
		var parametros = {
			"vcod" : $('#txtcodEditorialMod').val(),
			"vedi" : $('#txtEditorialMod').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DModificarEditorial.php",
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

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
					$('#listGeneros').load('listarGenero.php');
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
					$('#listGeneros').load('listarGenero.php');
					document.forms['FormModificarEditorial'].reset();
					$("#CajaMensaje").slideDown("fast");
					$("#CajaMensaje").html(datos);
				}
		});
	}



	function EliminarGenero(){
		var parametros = {
			"vcod" : $('#txtcodGeneroEli').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DEliminarGenero.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando")
				},
				success:function(datos){
					$('#listGeneros').load('listarGenero.php');
					document.forms['FormEliminarEditorial'].reset();
					$('#CajaMensaje').slideDown("fast");
					$('#CajaMensaje').html(datos);
				}
		});
	}
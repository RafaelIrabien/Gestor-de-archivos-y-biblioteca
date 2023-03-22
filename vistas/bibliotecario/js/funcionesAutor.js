
	function ListarAutor(){
		var parametros = {};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "listarAutor.php",
				beforeSend:function(){
					$('#listAutores').html("Procesando")
				},

				success:function(datos){
					$('#listAutores').html(datos);
				}
		});
	}


	function GuardarAutor(){
		var parametros = {
			"vautor" : $('#txtautor').val(),
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DNuevoAutor.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando")
				}, 

				success:function(datos){
					document.forms['FormAgregarAutor'].reset();
					$('#CajaMensaje').slideDown("fast");
					$('#CajaMensaje').html(datos);
				}
		});
	}



	function ModificarAutor(){
		var parametros = {
			"vcod" : $('#txtcodautorMod').val(),
			"vautor" : $('#txtautorMod').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DModificarAutor.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando")
				},

				success:function(datos){
					document.forms['FormModificarAutor'].reset();
					$('#CajaMensaje').slideDown("fast");
					$('#CajaMensaje').html(datos);
				}
		});
	}



	function EliminarAutor(){
		var parametros = {
			"vcod" : $('#txtcodautorEli').val(),
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DEliminarAutor.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando");
				},

				success:function(datos){
					document.forms['FormEliminarAutor'].reset();
					$('#CajaMensaje').slideDown("fast");
					$('#CajaMensaje').html(datos);
				}
		});
	}
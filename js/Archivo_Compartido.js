	
	function obtenerArchivoPorId(idArchivo) {
		$.ajax({
				type: "POST",
				data: "idArchivo=" + idArchivo,
				url: "../procesos/compartido/obtenerArchivo.php",
				success:function(respuesta) {
					$('#archivoObtenido').html(respuesta);
				}
		});
	}



	function obtenerInstruccion(idArchivo) {
		$.ajax({
				type: "POST",
				data: "idArchivo=" + idArchivo,
				url: "../procesos/compartir/archivos/obtenerInstruccion.php",
				success:function(respuesta) {
				 $('#instruccionObtenido').val(respuesta);
				 
				}
		});
	}
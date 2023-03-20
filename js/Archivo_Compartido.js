	
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
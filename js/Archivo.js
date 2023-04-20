
	function agregarArchivo() {

		
		//FormData es un objeto de JS que nos permite enviar archivos
		var formData = new FormData(document.getElementById('frmArchivos'));
		
		if (formData.get('archivos[]').name == '') {
			swal("No hay archivo(s)");
			return;
		}
		else if ($('#instruccion').val() == "") {
			swal("No hay descripción");
			return;
		
		} else {

		$.ajax({
				url: "../procesos/compartir/archivos/guardarArchivo.php",
				type: "POST",
				//Esto es para que reconozca el formulario como un html
				//aunque traiga archivos
				datatype: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(respuesta) {
					respuesta = respuesta.trim();
					
					if (respuesta == 1) {
						//Se reinicia el formulario
						$('#frmArchivos')[0].reset();
						//Se recarga la tabla
						$('#tablaArchivos').load('compartir/tablaArchivos.php');
						swal(":D", "Agregado con éxito", "success");
					} else {
						swal(":(", "Falló al agregar", "error");
					}
				}
		});
	  }
	}



	function eliminarArchivo(idArchivo) {
		//parseInt analiza un argumento de cadena y devuelve un número entero
		//El resultado de esta operación se vuelve a almacenar en la variable
		idArchivo = parseInt(idArchivo);

		if (idArchivo < 1) {
			swal("No tiene identificador de archivo");
			return false;
		} else {
			//Muestra mensaje de advertencia
			swal({
				title: "¿Está seguro de eliminar este archivo",
				text: "Una vez eliminado, no podrá recuperarse",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
							type: "POST",
							data: "idArchivo=" + idArchivo,
							url: "../procesos/compartir/archivos/eliminarArchivo.php",
							success:function(respuesta) {

								if (respuesta == 1) {
									$('#tablaArchivos').load('compartir/tablaArchivos.php');
									swal("Archivo eliminado con éxito", {
										icon: "success",
									});
								} else {
									swal(":(", "Falló al eliminar", "error");
								}
							}
					});
				}
			});
		}
	}



	function obtenerArchivoPorId(idArchivo) {
		$.ajax({
				type: "POST",
				data: "idArchivo=" + idArchivo,
				url: "../procesos/compartir/archivos/obtenerArchivo.php",
				success:function(respuesta) {
					$('#archivoObtenido').html(respuesta);
				}
		});
	}
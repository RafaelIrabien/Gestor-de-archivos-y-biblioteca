
	function agregarArchivo() {
		//FormData es un objeto de JS que nos permite enviar archivos
		var formData = new FormData(document.getElementById('frmArchivos'));

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
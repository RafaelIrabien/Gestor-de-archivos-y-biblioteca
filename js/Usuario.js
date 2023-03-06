
	function agregarFotoPerfil(){
		//FormData es un objeto de JS nativo que nos permite enviar archivos
		var formData = new FormData(document.getElementById('frmFoto'));

		$.ajax({
				url: "../procesos/usuario/perfil/guardarFotoPerfil.php",
				type: "POST",
				datatype: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(respuesta) {

					respuesta = respuesta.trim();

					if (respuesta == 1) {
						//Se reinicia el formulario
						$('#frmFoto')[0].reset();
						swal(":D", "Foto de perfil agregada con éxito", "success");
					} else {
						swal(":(", "Falló al agregar", "error");
					}
				}
		});
	}


	/*function obtenerDatosFoto(idFoto) {
		$.ajax({
			  type: "POST",
			  data: "idFoto=" + idFoto,
			  url: "../procesos/usuario/obtenerFotoPerfil.php",
		});
	}*/

	function agregarFotoPerfil(){
		//FormData es un objeto de JS nativo que nos permite enviar archivos
		var formData = new FormData(document.getElementById('frmFoto'));

		$.ajax({
				url: "../procesos/usuario/perfil/proceso_guardar.php",
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


	function obtenerDatosNombre(id_Usuario) {
		$.ajax({
			  type: "POST",
			  data: "id_Usuario=" + id_Usuario,
			  url: "../procesos/usuario/perfil/obtenerNombre.php",
			  success:function(respuesta) {
			  	respuesta = jQuery.parseJSON(respuesta);

			  	$('#id_Usuario').val(respuesta['idUsuario']);
			  	$('#Nombre').val(respuesta['Nombre']);
			  	$('#Email').val(respuesta['Email']);
			  }
		});
	}


	function actualizarNombre() {
		//Si el control o input viene vacío, entonces muestra un mensaje
		if ($('#Nombre').val() == "") {
			swal("No hay nombre de usuario");
		} else {

			$.ajax({
				type: "POST",
				//Mandamos el formulario completo
				data: $('#frmActualizarNombre').serialize(),
				url: "../procesos/usuario/perfil/actualizarNombre.php",
				success:function(respuesta) {
					respuesta = respuesta.trim();

					if (respuesta == 1) {
						window.location.reload(true);
						swal(":D", "Nombre de usuario actualizado con éxito", "success");
					} else {
						swal(":(", "Falló al actualizar", "error");
					}
				}
			});
		}

	}
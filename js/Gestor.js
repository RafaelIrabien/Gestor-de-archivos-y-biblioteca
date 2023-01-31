
	function agregarArchivosGestor(){
	//FormData es un objeto de JS nativo que nos permite enviar archivos
		var formData = new FormData(document.getElementById('frmArchivos'));

		$.ajax({
				url: "../procesos/gestor/guardarArchivos.php",
				type: "POST",
				//Esto es para que reconozca el formulario como un html aunque traiga archivos
				datatype: "html",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success:function(respuesta) {
				 console.log(respuesta);
				 respuesta = respuesta.trim();

				 if (respuesta == 1) {
				 	$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
				 	swal(":D", "Agregado con éxito", "success");
				 } else {
				 	swal(":(", "Falló al agregar", "error");
				 }
				}
		});
	}
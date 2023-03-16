
	function agregarEnlace() {
		//Validamos que el input esté lleno, por lo que lo guardamos en una variable
		var enlace = $('#Enlace').val();

		if (enlace == "") {
			swal("Debe agregar un enlace");
			return false;
		} else {

			$.ajax({
				  type: "POST",
				  data: "enlace=" + enlace,
				  url: "../procesos/compartir/enlaces/agregarEnlace.php",
				  success:function(respuesta) {
				  	respuesta = respuesta.trim();

				  	if (respuesta == 1) {
				  		//Cargar la tabla
				  		$('#tablaEnlaces').load("compartir/tablaEnlaces.php");

				  		//Limpiamos el control una vez agregado el enlace 
				  		//y agregamos los mensajes
				  		$('#Enlace').val("");
				  		swal(":D", "Enlace agregado con éxito", "success");
				  	} else {
				  		swal(":(", "Falló al agregar", "error");
				  	}
				  }
			});
		}
	}



	function obtenerDatosEnlace(idEnlace) {
		$.ajax({
			   type: "POST",
			   data: "idEnlace=" + idEnlace,
			   url: "../procesos/compartir/enlaces/obtenerEnlace.php",
			   success:function(respuesta) {
			   	respuesta = jQuery.parseJSON(respuesta);

			   	$('#id_Enlace').val(respuesta['idEnlace']);
			   	$('#EnlaceE').val(respuesta['Enlace']);
			   }
		});
	}






   //Función para copiar el enlace seleccionado en la tabla
	function Copiar(element) {
		//Creamos un input que nos ayudará a guardar el textoo temporalmente
		var temp = $("<input>");

		//Lo agregamos a nuestro body
		$("body").append(temp);

		//Agregamos en el atributo value del input el contenido html encontrado
		//en el <td> que se dió click
		//y seleccionamos el input temporal
		temp.val($(element).html()).select();

		//Ejecutamos la función de copiado
		document.execCommand("copy");

		//Mostramos un mensaje de que el enlace se copió con éxito
		swal("Enlace copiado");

		//Eliminamos el input temporal
		temp.remove();
	}
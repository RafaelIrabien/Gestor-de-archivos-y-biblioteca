
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
				 	//Se reinicia el formulario
				 	$('#frmArchivos')[0].reset();
				 	//Se recarga la tabla
				 	$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
				 	swal(":D", "Agregado con éxito", "success");
				 } else {
				 	swal(":(", "Falló al agregar", "error");
				 }
				}
		});
	}



	function eliminarArchivo(idArchivo) {
	//parseInt analiza un argumento de cadena y devuelve un número entero (entero). 
	//El resultado de esta operación se vuelve a almacenar en la misma variable idArchivo.
		idArchivo = parseInt(idArchivo);

		if (idArchivo < 1) {
			swal("No tiene id de archivo");
			return false;

		} else {
			//Muestra mensaje de advertencia
			swal({
				title: "¿Está seguro de eliminar este archivo?",
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
						url: "../procesos/gestor/eliminarArchivo.php",
						success:function(respuesta){
							
							if (respuesta == 1) {
								$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
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
			url: "../procesos/gestor/obtenerArchivo.php",
			success:function(respuesta){
				$('#archivoObtenido').html(respuesta);
			}
		});
	}

	
	function obtenerArchivosUsuario(idUsuario) {
		$.ajax({
			type: "POST",
			data: "idUsuario=" + idUsuario,
			url: "../procesos/gestor/obtenerArchivoUsuario.php",
			success:function(respuesta){
				res= jQuery.parseJSON(respuesta);
			  
			var tbody = $('#tablaArchivosUsuario'); //Seleccionar el elemento tbody
		
			//Vaciar el tbody en caso de que ya haya filas
			tbody.empty();
			for (let i = 0; i < res.length; i++) { //Iterar a través de la matriz de archivos
				if (res[i].id_Usuario === idUsuario) { //Ignorar las filas que no sean del usuario seleccionado
					idArchivo = res[i].idArchivo;
					 if (i == 0) {
            			var th = $('<tr>');
            			th.append($('<th style="text-align: center;">').text('Categoría'));
            			th.append($('<th style="text-align: center;">').text('Nombre'));
            			th.append($('<th style="text-align: center;">').text('Tipo'));
            			th.append($('<th style="text-align: center;">').text('Opciones'));
            			tbody.append(th);
          			}

				var tr = $('<tr></tr>'); //Crear una nueva fila de la tabla
				var rutaDescarga = "../archivos/" + res[i].id_Usuario + "/" + res[i].Nombre;
				//Agregar una columna por cada atributo

				tr.append("<td hidden=''>" + res[i].idArchivo + "</td>");
				tr.append("<td hidden=''>" + res[i].id_Usuario + "</td>");
				tr.append("<td>" + res[i].idCategoria + "</td>");
				tr.append("<td>" + res[i].Nombre + "</td>");
				tr.append("<td>" + res[i].Tipo + "</td>");
				tr.append("<td>" + 
					"<a class='btn btn-success btn-sm' href='" + rutaDescarga + "' download='" + res[i].Nombre + "'><span class='fas fa-download'></span></a>"
					  + "<span id='ver' class='btn btn-primary btn-sm'><span class='fas fa-eye'></span></span>" 
					  + $(function(){
					  	$('#ver').on('click',  function(){
					  	 $('#modalVer').modal()
					  	})
					   }),
					  + "</td>");
				tbody.append(tr);
				
        		
        	}
		}	
	} 
  });
}


/*
	function Archivos(res) {
		
		const tabla = document.querySelector('tabla_archivos');

		for (let i = 0; i < res.length; i++) {

			
		}
	} */
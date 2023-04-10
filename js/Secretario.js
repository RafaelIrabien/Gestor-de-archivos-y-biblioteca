
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
            			th.append($('<th style="text-align: center;">').text('Descargar'));
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
					"<a href='" + rutaDescarga + "' download='" + res[i].Nombre + "'><span class='btn btn-success btn-sm'><span class='fas fa-download'></span></span></a>"
					  + "</td>");
				tbody.append(tr);
				
        		
        	}
		}	
	} 
  });
}




	function eliminarUsuario(id_Usuario) {

		id_Usuario = parseInt(id_Usuario);

		if (id_Usuario < 1) {
			swal("No tiene identificador de usuario");
			return false;
		
		} else {
			//Muestra mensaje de advertencia
			swal({
				title: "¿Está seguro de querer eliminar este usuario?",
				text: "Una vez eliminado, no podrá recuperarse, incluyendo los archivos relacionados a este",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
							type: "POST",
							data: "id_Usuario=" + id_Usuario,
							url: "../procesos/usuario/eliminar/eliminarUsuario.php",
							success:function(respuesta) {
								
								if (respuesta == 1) {
									$('#tablaUsuarios').load('usuarios/tablaUsuarios.php');
									swal("Usuario eliminado con éxito", {
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
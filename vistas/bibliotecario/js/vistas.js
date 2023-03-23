
	function VistaLibro(){
		var parametros = {};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "V_Libro.php",
				beforeSend:function(){
					$('#contenido').html();
				},
				success:function(vista){
					$('#contenido').html(vista);
				}
		});
	}



	function VistaDetalleAutor(){
		var parametros = {};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "VDetalleAutor.php",
				beforeSend:function(){
					$('#contenido').html();
				},

				success:function(vista){
					$('#contenido').html(vista);
				}
		});
	}


	function VistaDetalleEditorial(){
		var parametros = {};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "VDetalleEditorial.php",
				beforeSend:function(){
					$('#contenido').html();
				},
				success:function(vista){
					$('#contenido').html(vista);
				}
		});
	}

	
	function VistaPrestamo(Cod){
	var parametros = {
		"cod" : Cod
	};

	$.ajax({

		data: parametros,
		url: "VPrestamo.php",
		type: "POST",
		beforeSend: function(){
			$("#contenido").html();
		},
		success: function(vista){
			$("#contenido").html(vista);
		}

	});
}


	function VistaLibrosPrestados() {
		var parametros = {};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "Vlibrosprestados",
				beforeSend:function(){
					$('#contenido').html();
				},
				success:function(vista){
					$('#contenido').html(vista);
				}
		});
	}


	function VistaLibrosRetornados() {
		var parametros = {};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "V_LibrosRetornados.php",
				beforeSend:function(){
					$('#contenido').html();
				},
				success:function(vista){
					$('#contenido').html(vista);
				}
		});
	}
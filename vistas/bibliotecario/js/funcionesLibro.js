
	function ListarLibro(){
		var parametros = {
			"dbusqueda": $('#txtbusqueda').val()			
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "listarLibros.php",
				beforeSend:function(){
					$('#ListaLi').html("Procesando");
				},

				success:function(datos){
					$('#ListaLi').html(datos);
				}
		});
	}



	function VNuevoLi(){
		var parametros = {};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "VNueLibro.php",
				beforeSend:function(){
					$('#ContenidoLi').html("Procesando");
				},

				success:function(datos){
					$('#ContenidoLi').html(datos);
				}
		});
	}



	function VModificarLibro(Cod){
		var parametros = {
			"vcod" : Cod
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "VModificarLibro.php",
				beforeSend:function(){
					$('#ContenidoLi').html("Procesando");
				},
				success:function(datos){
					$('#ContenidoLi').html(datos);
				}
		});
	}



	function VEliminarLibro(Cod){
		var parametros = {
			"vcod" : Cod
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "VEliminarLibro.php",
				beforeSend:function(){
					$('#ContenidoLi').html("Procesando");
				},
				success:function(datos){
					$('#ContenidoLi').html(datos);
				}
		});
	}



	function DEliminarLibro(Cod){
		var parametros = {
			"vcod" : Cod
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DEliminarLibro.php",
				beforeSend:function(){
					$('#ContenidoLi').html("Procesando");
				},
				success:function(datos){
					$('#ContenidoLi').html(datos);
				}
		});

	}
	

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


/*
function VModificarLi(Cod){

	var parametros = {
		"vcod": Cod
	};

	$.ajax({
		data: parametros,
		url: 'VModLibro.php',
		type: 'POST',
		beforeSend: function(){
			$("#ContenidoLi").html("Procesando");
		},
		success: function(datos){
			$("#ContenidoLi").html(datos);
		}
	});



}

function VEliminarLi(Cod){
	var parametros = {
	"vcod": Cod
	};

	$.ajax({
		data: parametros,
		url: 'VEliLibro.php',
		type: 'POST',
		beforeSend: function(){
			$("#ContenidoLi").html("Procesando");
		},
		success: function(datos){
			$("#ContenidoLi").html(datos);
		}
	});

}








function DEliminarLi(Cod){

	var parametros = {
		"vcod": Cod
	};

	$.ajax({
		data: parametros,
		url: 'DEliLibro.php',
		type: 'POST',
		beforeSend: function(){
			$("#ContenidoLi").html("Procesando");
		},
		success: function(datos){
			$("#ContenidoLi").html(datos);
		}
	});

}
*/
	
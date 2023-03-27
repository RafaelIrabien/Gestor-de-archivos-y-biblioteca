
	function ListarStockLibro(){
	var parametros = {
		"dbusqueda" : $("#txtbusqueda").val()
	};

	$.ajax({
		data: parametros,
		url: 'listarStockLibros.php',
		type: 'POST',
		beforeSend: function(){
			$("#ListaLibros").html("Procesando")
		},
		success: function(datos){
			$("#ListaLibros").html(datos);
			
		}
	});

}


/*
	function GuardarPrestamo(){
	var parametros ={
		
		"codBibliotecario" : $('#txtCodBi').val(),
		"codLector" : $('#cboLector').val(),
		"fechaDevolucion" : $("#dtpFecha").val(),
		"CodLibro" : $("#txtCodLibro").val()
	};


	$.ajax({
		data: parametros,
		url: 'DGuardarPrestamo.php',
		type: 'POST',
		beforeSend: function(){
			$("#CajaMensaje").html("Procesando")
		},
		success: function(datos){
			ListarStockLibro();
			
			$("#txtCodLibro").val('');
			$("#MsjVerificarLector").slideUp("fast");
			$("#MsjVerificarPrestamo").slideDown("fast");
			$("#MsjVerificarPrestamo").html(datos);
		}
	});

}*/

	function GuardarPrestamo(){
		var parametros = {
			"Lector" : $('#lector').val(),
			"fechaDevolucion" : $('#dtpFecha').val(),
			"CodLibro" : $('#txtCodLibro').val()
		};

		$.ajax({
				type: "POST",
				data: parametros,
				url: "DGuardarPrestamo.php",
				beforeSend:function(){
					$('#CajaMensaje').html("Procesando")
				},
				success:function(datos){
					ListarStockLibro();

					$('#txtCodLibro').val('');
					$("#MsjVerificarPrestamo").slideDown("fast");
					$('#MsjVerificarPrestamo').html(datos);
				}
		});
	}



	function ListarLibrosPrestados(){
	var parametros = {
		"dbusqueda": $('#txtbusqueda').val()
	};

	$.ajax({
		data: parametros,
		url: "listarLibrosPrestados.php",
		type: "POST",
		beforeSend: function(){
			$('#ListaLP').html("Procesando")
		},
		success: function(datos){
			$('#ListaLP').html(datos);
		}
	});
}



	function ListarLibrosDevueltos(){
	var parametros = {
		"dbusqueda": $('#txtbusqueda').val()
	};

	$.ajax({
		data: parametros,
		url: "listarLibrosDevueltos.php",
		type: "POST",
		beforeSend: function(){
			$('#ListaLR').html("Procesando")
		},
		success: function(datos){
			$('#ListaLR').html(datos);
		}
	});

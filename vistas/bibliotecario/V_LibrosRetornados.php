<?php 
	session_start();
	include('conexion.php');

	$id_Usuario = $_SESSION['id_usuario'];
   

  	$sql1 = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result1 = $cnmysql->query($sql1);
  	$fila1 = mysqli_fetch_array($result1);
	 // $id = $fila['id_usuario'];
	if($fila1['id_rol'] == '3') {

	 if(isset($_SESSION['nombre'])) {
		

 ?>


 <!DOCTYPE html>
<html>
<head>

	<script type="text/javascript">
		

			function imprSelec(nombre) {
			  var ficha = document.getElementById(nombre);//obtenemos el objeto a imprimir
			  var ventimp = window.open(' ', 'popimpr'); //abrimos una ventana vacía nueva
			  ventimp.document.write( ficha.innerHTML ); //imprimimos el HTML del objeto en la nueva ventana
			  ventimp.document.close(); //cerramos el documento
			  ventimp.print( ); //imprimimos la ventana
			  ventimp.close(); //cerramos la ventana

			}
	</script>
	

	<link rel="stylesheet" type="text/css" href="css_l/hoja_ImprLibrosRetornados.css" media="print">
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosRetornados.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibrosDevueltos.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLR").html("Procesando")
			},
			success: function(datos){
			$("#ListaLR").html(datos);
			}
			});


		})



</script>


	<div id="ContenidoLR">
		
		<div id="DatosLR">
			


			<div id="tablaLR">
				
				<h1>Libros Retornados</h1>
				<div id="busqueda">




					<div id="ImprimirLR">
					<button onclick="imprSelec('ListaLR');">Imprimir</button>
					</div>	

					<div id="BusquedaLR">
					<input type="text" id="txtbusqueda" name="" placeholder="Nro Carnet Lector">
					<button type="button" onclick="ListarLibrosDevueltos();">Buscar</button>
					</div>


					
				</div>

				<div id="ListaLR">
					
				</div>

			</div>


		</div>

	</div>




</body>
</html>





 <?php 
 	} else {
		header("location:../../index.php");
	}

} else {
	header("location:../inicio.php");
}


  ?>
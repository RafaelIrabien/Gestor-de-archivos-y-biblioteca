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
	<title></title>

	<link rel="stylesheet" type="text/css" href="css_l/hoja_librosPrestados.css">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
</head>
<body>

<script type="text/javascript">
		$(function ListarDefault(){
			var parametros = {
			"dbusqueda": $("#txtbusqueda").val()
			};

			$.ajax({
			data: parametros,
			url: 'listarLibrosPrestados.php',
			type: 'POST',
			beforeSend: function(){
			$("#ListaLP").html("Procesando")
			},
			success: function(datos){
			$("#ListaLP").html(datos);
			}
			});


			})


			function imprSelec(nombre) {
			  var ficha = document.getElementById(nombre);//obtenemos el objeto a imprimir
			  var ventimp = window.open(' ', 'popimpr'); //abrimos una ventana vacía nueva
			  ventimp.document.write( ficha.innerHTML ); //imprimimos el HTML del objeto en la nueva ventana
			  ventimp.document.close(); //cerramos el documento
			  ventimp.print( ); //imprimimos la ventana
			  ventimp.close(); //cerramos la ventana

			}



</script>


	<div id="ContenidoLP">
		
		<div id="DatosLP">
			


			<div id="tablaLP">
				
				<h1>Libros Prestados</h1>
				<div id="busqueda">

					<div id="NuevoLP">
					<span class="btn btn-primary" onclick="imprSelec('ListaLP');">Imprimir</span>
					</div>	

					<div id="BusquedaLP">
					<input  type="text" id= "txtbusqueda" name="" placeholder="Nombre del lector">
					<span class="btn btn-primary" type="button" onclick="ListarLibrosPrestados();">Buscar</span>
					
					</div>

					
				</div>

				<div id="ListaLP">
					
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
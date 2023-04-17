<?php 
	session_start();

	$fecha = date('Y-m-d');

	$nuevaFecha = strtotime('-1 day', strtotime($fecha));
	$nuevaFechaYear = strtotime('+1 year', strtotime($fecha));

	$fechaActual = date('Y-m-d', $nuevaFecha);
	$fechaMaxima = date('Y-m-d', $nuevaFechaYear);



	include "conexion.php";

	$id_Usuario = $_SESSION['id_usuario'];
   
  	$sql1 = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$id_Usuario'";
  	$result1 = $cnmysql->query($sql1);
  	$fila1 = mysqli_fetch_array($result1);
	 // $id = $fila['id_usuario'];
	if($fila1['id_rol'] == '3') {

	 if(isset($_SESSION['nombre'])) {


	 	$lectores = $cnmysql->query("SELECT * FROM lectores");
	 	$fila = mysqli_fetch_array($lectores);
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css_l/Prestamos.css">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
</head>

	

<body>
	<div id="ContPrestamo">
		
		<div id="ContDatos">
			<h1>Préstamo</h1>
			<form id="FormPrestamo" method="POST">
				<div>
					<label for="lector">Nombre del lector:</label>
					<div style="text-align: center;">
						<input class="form-control" type="text" name="lector" id="lector" required>
						<br><br>
						<span class="btn btn-warning" onclick="VerificarLector();">Verificar
						</span>
					</div>
				</div>

				<div id="MsjVerificarLector">
					
				</div>

				<div id="FechaCodigo">
					<label for="dtpFecha">Fecha de devolución:</label>
					<br>
					<input class="form-control" type="date" name="dtpFecha" id="dtpFecha" step="1" min="<?php echo $fechaActual; ?>" max="<?php echo $fechaMaxima; ?>" value="<?php echo $fechaActual; ?>">
				<br>
					<label for="txtCodLibro">Códico del libro:</label>
					<div>
						<input class="form-control" type="number" id="txtCodLibro" name="txtCodLibro" min="1">
					</div>
				</div>

				<div id="MsjVerificarLibro">
					
				</div>

				<div id="botones">
					<span class="btn btn-primary" onclick="GuardarPrestamo();">
						Guardar
					</span>
				
					<a href="index_bibliotecario.php">
						<span class="btn btn-secondary">
						Cancelar
						
					</span>
					</a>
				</div>

				<div id="MsjVerificarPrestamo">

				</div>
			</form>
		</div>


		<div id="ContListLibros">
			<h1>Lista de libros</h1>
			<!--
				<div id="busqueda" class="input-group">
					
					<input class="form-control" type="text" id="txtbusqueda" placeholder="Título del libro">
					<span class="btn btn-primary" onclick="ListarStockLibro();">
					Buscar
					</span>	

				
				
				</div> -->

				<div id="ListaLibros">
					
				</div>
				
		</div>
	</div>

</body>
</html>




<script type="text/javascript">
  	$(document).ready(function(){
  		$('#ListaLibros').load('listarStockLibros.php');
     
  	});
  </script>


<?php 
	
	} else {
		header("location:../../index.php");
	}

} else {
	header("location:../inicio.php");
}

 ?>
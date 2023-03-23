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

	 	$dCod = $_POST['vcod'];

	 	$sql = "SELECT * FROM libros WHERE id_libro = '$dCod'";
	 	$result = $cnmysql->query($sql);
	 	$fila = mysqli_fetch_array($result);

	 	$Titulo = $fila['titulo'];


 ?>






<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css_l/hoja_EliLector.css">

	<title></title>
</head>
<body>
	<div id="CEliLi">
		
		<div id="CajaMensaje">
			<h1><strong>Mensaje del sistema</strong></h1>

			<div id="DatosLibro">
				<h5><?php echo $Titulo; ?></h5>
			</div>

			<p>¿Desea eliminar este libro del registro?</p>
			<div>
				<button type="button" onclick="DEliminarLibro(<?php echo $dCod; ?>);">Aceptar</button>
				<button type="button" onclick="VistaLibro();">Cancelar</button>
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
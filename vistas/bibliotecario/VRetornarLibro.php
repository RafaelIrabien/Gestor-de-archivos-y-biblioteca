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
		

		$dcodDp = $_POST['vcod'];

		$sql = "SELECT DP.id_detalle AS 'CodDp', LI.titulo AS 'Titulo', LE.nombre AS 'Lector'
			FROM detalle_prestamos DP
			INNER JOIN libros LI ON LI.id_libro = DP.id_libro
			INNER JOIN prestamos PR ON PR.id_prestamo = DP.id_prestamo
			INNER JOIN lectores LE ON LE.id_lector = PR.id_lector
			WHERE DP.id_detalle = '$dcodDp'";

	 	$result = $cnmysql->query($sql);
	 	$fila = mysqli_fetch_array($result);

	 	$Titulo = $fila['Titulo'];
	 	$Lector = $fila['Lector'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css_l/hoja_EliLector.css">
	<title></title>
</head>
<body>
	<div id="CEliLe">
		
		<div id="CajaMensaje">
			<h1><strong>Mensaje del Sistema</strong></h1>

			<div id="DatosLibro">
				<h5><?php echo $Titulo; ?></h5>
				<h6>Prestado por <?php echo $Lector; ?></h6>
			</div>
			
			<p>¿Desea retornar este libro?</p>
			<div>
				<span class="btn btn-primary" onclick="DRetornarLibro(<?php echo $dcodDp ;?>);">Aceptar</span>
				<span class="btn btn-secondary" onclick="VistaLibrosPrestados();">Cancelar</span>
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
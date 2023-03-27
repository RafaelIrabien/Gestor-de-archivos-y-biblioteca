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
			<p>¿Desea Retornar este Libro?</p>
			<div>
				<button type="button" onclick="DRetornarLibro(<?php echo $dcodDp ;?>);">Aceptar</button>
				<button type="button" onclick="VistaLibrosPrestados();">Cancelar</button>
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
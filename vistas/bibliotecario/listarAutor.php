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
		

	$sql = "SELECT * FROM autores";
	$result = $cnmysql->query($sql);

	$num_filas = mysqli_num_rows($result);

	if ($num_filas > 0) {
		
	
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<title></title>
</head>
<body>

	<table class="table table-hover" id="tablaAutores">
		<thead>
			<tr>
				<th style="text-align: center; width: 3px;">Código</th>
				<th style="text-align: center;">Autor</th>
			</tr>
		</thead>

		<tbody>
			<?php 
				while($fila = mysqli_fetch_array($result)) {
			 ?>
			<tr>
				<td style="width: 3px;"><?php echo $fila['id_autor']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
			</tr>
			<?php 
				}
			 ?>
		</tbody>
	</table>

</body>
</html>


<script type="text/javascript">
  	$(document).ready(function(){
  		$('#tablaAutores').DataTable();
     
  	});
</script>


<?php 
	} else {
		echo "No se encontraron resultados";
	}


	} else {
		header("location:../../index.php");
	}

} else {
	header("location:../inicio.php");
}

 ?>
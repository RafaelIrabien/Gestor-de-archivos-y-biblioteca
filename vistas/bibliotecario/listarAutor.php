<?php 
	include('conexion.php');

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

	<table class="table table-hover">
		<theader>
			<tr>
				<th style="text-align: center;">Código</th>
				<th style="text-align: center;">Autor</th>
			</tr>
		</theader>

		<tbody>
			<?php 
				while($fila = mysqli_fetch_array($result)) {
			 ?>
			<tr>
				<td><?php echo $fila['id_autor']; ?></td>
				<td><?php echo $fila['nombre']; ?></td>
			</tr>
			<?php 
				}
			 ?>
		</tbody>
	</table>

</body>
</html>


<?php 
	} else {
		echo "No se encontraron resultados";
	}

 ?>
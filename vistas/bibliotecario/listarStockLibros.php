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


	 	

	 	$sql = "SELECT LI.id_libro AS Codigo, LI.titulo AS Titulo, AU.nombre AS Autor, ED.editorial AS Editorial, LI.cantidad AS Cantidad, LI.disponibles AS Disponible
	 		FROM libros LI
	 		
	 		INNER JOIN autores AU ON AU.id_autor = LI.id_autor
	 		INNER JOIN editoriales ED ON ED.id_editorial = LI.id_editorial
	 		ORDER BY LI.id_libro DESC;
	 			";

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
	<table class="table table-hover" id="tablaStock">
		<thead>
			<tr>
				<th style="text-align: center;">Código</th>
				<th style="text-align: center;">Título</th>
				<!--
				<th>Autor</th>
				<th>Editorial</th>
				-->
				<th style="text-align: center;">Cantidad</th>
				<th style="text-align: center;">Disponibles</th>
			</tr>
		</thead>

		<tbody>

			<?php 
				while($fila = mysqli_fetch_array($result)){
			 ?>
			<tr>
				<td id="codigo"><?php echo $fila['Codigo']; ?></td>
				<td id="titulos"><?php echo $fila['Titulo']; ?></td>
				<!--
				<td><?php //echo $fila['Autor']; ?></td>
				<td><?php //echo $fila['Editorial']; ?></td>
				-->
				<td id="cantidad"><?php echo $fila['Cantidad']; ?></td>
				<td id="disponible"><?php echo $fila['Disponible']; ?></td>
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
  		$('#tablaStock').DataTable();
     
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
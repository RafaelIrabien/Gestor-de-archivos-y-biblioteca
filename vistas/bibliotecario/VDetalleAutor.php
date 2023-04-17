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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css_l/hoja_DetAutor.css">
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<title></title>
</head>



<body>
	<div id="contenidoDetAutor">
		<div id="cajaMayor">
			<h2>Opciones de autor</h2>

			<div id="caja1">
				<fieldset>
				
					<div id="listAutores">
						
					</div>
				</fieldset>
			</div>

			<div id="caja2">
				<div id="agregarAutor">
					<form id="FormAgregarAutor">
						<input type="text" name="txtautor" id="txtautor" placeholder="Nuevo autor" required>
						<span class="btn btn-primary" type="button" onclick="GuardarAutor();">Agregar autor</span>
					</form>
				</div>

				<hr>

				<div id="modificarAutor">
					<form id="FormModificarAutor">
						<input type="text" name="txtcodautorMod" id="txtcodautorMod" placeholder="Código de autor" required>
						<input type="text" name="txtautorMod" id="txtautorMod" placeholder="Cambiar nombre por ..." required>

						<span class="btn btn-warning" type="button" onclick="ModificarAutor();">Modificar autor</span>
					</form>
				</div>

				<hr>

				<div id="EliminarAutor">
					<form id="FormEliminarAutor">
						<input type="text" id="txtcodautorEli" placeholder="Ingrese código de autor" required>
						<span class="btn btn-danger" type="button" onclick="EliminarAutor();">Eliminar autor</span>
					</form>
				</div>


			</div>

			<div id="CajaMensaje">
				
			</div>

			<div id="Regreso">
				<span class="btn btn-secondary" onclick="VistaLibro();">Regresar</span>
			</div>

		</div>
	</div>

</body>
</html>


<script type="text/javascript">
  	$(document).ready(function(){
  		$('#listAutores').load('listarAutor.php');
     
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
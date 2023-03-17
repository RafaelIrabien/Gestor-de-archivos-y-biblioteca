<?php 
		session_start();

		require_once "../clases/Conexion.php";
		$c = new Conectar;
		$conexion = $c->conexion();

		$idUsuario = $_SESSION['id_usuario'];

		$sql = "SELECT id_usuario, id_rol FROM usuarios WHERE id_usuario = '$idUsuario'";
		$result = mysqli_query($conexion, $sql);
		$fila = mysqli_fetch_array($result);

		if ($fila['id_rol'] == '2') {

			if ($_SESSION['nombre']) {
				include "header.php";
    		include "fondo.php";
 ?>  





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/tablas.css">
	<title></title>
</head>
<body>

	<div class="contenido compartir">
		<br>
		<div class="container">
			<h1 class="display-4">Archivos</h1>
			<div id="btn">
				<span class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalCompartir">
				  <span class="fa-solid fa-file-arrow-up"></span>
				  Agregar archivo
				</span>
			</div>
			<br>
			<div id="tablaArchivos"></div>
		</div>
	</div>


	<!-- Modal Agregar Compartido -->
<div class="modal fade" id="modalCompartir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Agregar archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	<form id="frmArchivos" enctype="multipart/form-data" method="POST">
        		<label>Selecciona archivos:</label>
        		<input type="file" name="archivos[]" id="archivos[]" multiple="">
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
      </div>
    </div>
  </div>
</div>



</body>
</html>

<?php 
include "footer.php";
 	} else {
 		header("location:../index.php");
 }

} else {
	header("location:inicio.php");
}

 ?>



 <script type="text/javascript" src="../js/Archivo.js"></script>
 <script type="text/javascript">
 	$(document).ready(function(){
 		$('#tablaArchivos').load("compartir/tablaArchivos.php");

 		$('#btnGuardarArchivos').click(function(){
 			agregarArchivo();
 		});
 	});
 </script>